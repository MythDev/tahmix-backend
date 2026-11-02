<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Ad soyad gerekli.',
            'email.required' => 'E-posta gerekli.',
            'email.email' => 'Geçerli bir e-posta girin.',
            'email.unique' => 'Bu e-posta zaten kullanılıyor.',
            'password.required' => 'Şifre gerekli.',
            'password.min' => 'Şifre en az 8 karakter olmalı.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'is_premium' => false,
                'is_vip_dealer_approved' => false,
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Kayıt başarılı',
                'user' => $user,
                'token' => $token,
            ], 201);

        } catch (\Throwable $e) {
            Log::error('Register Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'message' => config('app.debug')
                    ? 'Kayıt hatası: ' . $e->getMessage()
                    : 'Sunucu hatası oluştu. Lütfen tekrar deneyin.'
            ], 500);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'E-posta adresi zorunludur.',
            'email.email' => 'Geçerli bir e-posta giriniz.',
            'password.required' => 'Şifre alanı zorunludur.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['E-posta veya şifre hatalı.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Giriş başarılı',
            'user' => $user,
            'token' => $token,
        ], 200);
    }
    public function googleAuth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_token' => 'required_without:token|string',
            'token' => 'required_without:id_token|string',
        ], [
            'id_token.required_without' => 'Google token gerekli',
            'token.required_without' => 'Google token gerekli',
        ]);

        if ($validator->fails()) {
            Log::error('Google Auth Validation Failed', ['errors' => $validator->errors()]);
            return response()->json([
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $client = new \Google_Client([
                'client_id' => config('services.google.client_id')
            ]);

            $token = $request->input('id_token') ?? $request->input('token');
            $isIdToken = $request->has('id_token');

            if ($isIdToken) {
                $payload = $client->verifyIdToken($token);

                if (!$payload) {
                    return response()->json(['message' => 'Geçersiz ID token'], 401);
                }

                $googleId = $payload['sub'];
                $email = $payload['email'];
                $name = $payload['name'] ?? 'Google User';
                $avatar = $payload['picture'] ?? null;
                $emailVerified = $payload['email_verified'] ?? false;
            } else {
                $client->setAccessToken($token);

                try {
                    $oauth2 = new \Google_Service_Oauth2($client);
                    $userInfo = $oauth2->userinfo->get();

                    $googleId = $userInfo->id;
                    $email = $userInfo->email;
                    $name = $userInfo->name ?? 'Google User';
                    $avatar = $userInfo->picture ?? null;
                    $emailVerified = $userInfo->verifiedEmail ?? false;
                } catch (\Exception $e) {
                    return response()->json([
                        'message' => 'Geçersiz Access token',
                        'error' => $e->getMessage()
                    ], 401);
                }
            }

            if (!$emailVerified) {
                return response()->json([
                    'message' => 'Google hesabınızın e-postası doğrulanmamış'
                ], 403);
            }

            $user = User::where('google_id', $googleId)->first();

            if (!$user) {
                $user = User::where('email', $email)->first();

                if ($user) {
                    $user->google_id = $googleId;
                    if ($avatar && !$user->avatar) {
                        $user->avatar = $avatar;
                    }
                    $user->save();
                } else {
                    $user = User::create([
                        'name' => $name,
                        'email' => $email,
                        'google_id' => $googleId,
                        'avatar' => $avatar,
                        'password' => null,
                        'is_premium' => false,
                        'is_vip_dealer_approved' => false,
                        'email_verified_at' => now(),
                    ]);
                }
            } else {
                if ($avatar && $user->avatar !== $avatar) {
                    $user->avatar = $avatar;
                    $user->save();
                }
            }

            $user->tokens()->delete();
            $authToken = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Google ile giriş başarılı',
                'user' => $user,
                'token' => $authToken,
            ], 200);

        } catch (\Google_Exception $e) {
            Log::error('Google Exception', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Google kimlik doğrulama hatası',
                'error' => $e->getMessage()
            ], 401);
        } catch (\Exception $e) {
            Log::error('General Exception', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => config('app.debug') ? $e->getMessage() : 'Sunucu hatası'
            ], 500);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Çıkış başarılı'
        ]);
    }
    public function profile(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
            'is_premium' => $request->user()->is_premium
        ]);
    }
    public function deleteAccount(Request $request)
    {
        try {
            $user = $request->user();
            $user->favorites()->detach();
            $user->tokens()->delete();
            $user->delete();

            return response()->json([
                'message' => 'Hesabınız ve ilişkili tüm verileriniz başarıyla silindi.'
            ], 200);

        } catch (\Throwable $e) {
            Log::error('Delete Account Error: ' . $e->getMessage(), [
                'user_id' => $request->user()?->id,
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'message' => 'Hesap silinirken bir hata oluştu. Lütfen daha sonra tekrar deneyin.'
            ], 500);
        }
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'E-posta adresi zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.exists' => 'Bu e-posta adresine kayıtlı kullanıcı bulunamadı.',
        ]);

        try {
            $code = (string) random_int(100000, 999999);

            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => Hash::make($code),
                'created_at' => now(),
            ]);

            Mail::raw("Paşa Analiz şifre sıfırlama doğrulama kodunuz: {$code}\n\nBu kod 15 dakika boyunca geçerlidir.", function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Şifre Sıfırlama Doğrulama Kodu');
            });

            return response()->json([
                'message' => 'Doğrulama kodu e-posta adresinize gönderildi.'
            ], 200);

        } catch (\Throwable $e) {
            Log::error('Forgot Password Error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Kod gönderilirken bir hata oluştu.'
            ], 500);
        }
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code' => 'required|string|size:6',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.required' => 'E-posta zorunludur.',
            'code.required' => 'Doğrulama kodu zorunludur.',
            'code.size' => 'Doğrulama kodu 6 haneli olmalıdır.',
            'password.required' => 'Yeni şifre zorunludur.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            'password.confirmed' => 'Şifre tekrarları uyuşmuyor.',
        ]);

        try {
            $resetRecord = DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->first();

            if (!$resetRecord || now()->subMinutes(15)->gt($resetRecord->created_at)) {
                return response()->json([
                    'message' => 'Doğrulama kodu geçersiz veya süresi dolmuş.'
                ], 422);
            }

            if (!Hash::check($request->code, $resetRecord->token)) {
                return response()->json([
                    'message' => 'Girdiğiniz 6 haneli kod hatalı.'
                ], 422);
            }

            $user = User::where('email', $request->email)->first();
            $user->password = $request->password;
            $user->save();
            $user->tokens()->delete();

            DB::table('password_reset_tokens')->where('email', $request->email)->delete();

            return response()->json([
                'message' => 'Şifreniz başarıyla güncellendi.'
            ], 200);

        } catch (\Throwable $e) {
            Log::error('Reset Password Error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Şifre güncellenirken bir hata oluştu.'
            ], 500);
        }
    }
}
