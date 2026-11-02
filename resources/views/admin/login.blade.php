<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>TAHMİX | Giriş Yap </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="TAHMİX" name="description" />
    <meta content="TAHMİX" name="author" />
    <script type="module" src="{{ asset('admin/assets/js/layout-setup.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/simplebar/simplebar.min.css') }}">
    <link href="{{ asset('admin/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
</head>
<body>
<div class="position-fixed top-0 bottom-0 end-0 start-0 z-0 bg-pattern"></div>
<div class="auth-pattern-shapes d-none d-lg-block"></div>
<div class="auth-pattern-outline d-none d-lg-block"></div>
<div class="auth-pattern-shape extra d-none d-lg-block"></div>
<div class="auth-pattern-extra d-none d-lg-block"></div>
<header class="px-3 px-md-8 py-5 position-relative top-0 d-flex justify-content-center align-items-center w-100 z-1">
    <a href="index.html" class="d-flex justify-content-center align-items-center logo-main w-100">
        <img style="width: 20%; height: auto;" src="{{ asset('assets/images/tahmix-logo.png') }}">
    </a>
</header>
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-63 pb-10">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card mx-xxl-8 shadow-none">
                <div class="card-body p-8">
                    <h3 class="fw-medium text-center">Tekrar Hoşgeldiniz!</h3>
                    <p class="mb-8 text-muted text-center">Yönetim paneline erişmek için giriş yapın.</p>
                    <form action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">E-Posta Adresi <span class="text-danger">*</span></label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   placeholder="E-posta adresinizi girin"
                                   value="{{ old('email') }}"
                                   required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Şifre <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       placeholder="Şifrenizi girin"
                                       required>
                                <button type="button" class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted toggle-password" id="toggle-password" data-target="password">
                                    <i class="ri-eye-off-line align-middle"></i>
                                </button>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="my-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                                    <label class="form-check-label" for="rememberMe">Beni Hatırla</label>
                                </div>
                                <div class="form-text">
                                    <a href="#" class="link">Şifremi unuttum?</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-100 mb-4">Giriş Yap</button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="position-relative text-center fs-13 mb-0">©
                <script>document.write(new Date().getFullYear())</script> Paşa Analiz - İddaa Tahmin ve Analiz Platformu. Tüm Hakları Saklıdır.
            </p>
        </div>
    </div>
</div>
<script src="{{ asset('admin/assets/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/scroll-top.init.js') }}"></script>
<script src="{{ asset('admin/assets/js/auth/auth.init.js') }}"></script>
</body>
</html>
