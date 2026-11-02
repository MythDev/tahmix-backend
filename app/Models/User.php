<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'avatar',
        'is_premium',
        // RevenueCat alanları (Tek ve Net Kaynak)
        'revenue_cat_customer_id',
        'subscription_platform',      // 'app_store', 'play_store' veya 'test_store'
        'subscription_product_id',    // örn: 'monthly', 'weekly'
        'subscription_started_at',
        'subscription_expires_at',    // TEK BİTİŞ TARİHİ ALANI
        'subscription_auto_renew',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_premium' => 'boolean',
        'subscription_started_at' => 'datetime',
        'subscription_expires_at' => 'datetime',
        'subscription_auto_renew' => 'boolean',
    ];

    protected $appends = [
        'is_premium',
    ];

    /**
     * Kullanıcının VIP olup olmadığını tek bir yerden kontrol eder
     */
    public function getIsPremiumAttribute(): bool
    {
        return (bool) ($this->subscription_expires_at && $this->subscription_expires_at->isFuture());
    }

    /**
     * RevenueCat Webhook geldiğinde aboneliği günceller
     */
    public function updateSubscription(array $data): void
    {
        $this->update([
            'is_premium' => true,
            'subscription_platform' => $data['platform'] ?? $this->subscription_platform,
            'subscription_product_id' => $data['product_id'] ?? $this->subscription_product_id,
            'subscription_started_at' => $data['started_at'] ?? $this->subscription_started_at,
            'subscription_expires_at' => $data['expires_at'] ?? $this->subscription_expires_at,
            'subscription_auto_renew' => $data['auto_renew'] ?? $this->subscription_auto_renew,
        ]);
    }

    /**
     * Abonelik bittiğinde veya iptal edildiğinde
     */
    public function expireSubscription(): void
    {
        $this->update([
            'is_premium' => false,
            'subscription_auto_renew' => false,
        ]);
    }

    public function favorites()
    {
        return $this->belongsToMany(
            Matchs::class,
            'match_user_favorites',
            'user_id',
            'match_id'
        )->withTimestamps();
    }
}
