<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore the best mobile apps designed to enhance your experience. Discover top features, seamless performance, and easy downloads for iOS & Android.">
    <title>@yield('title', 'Tahmix')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uicons-regular-rounded.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&amp;display=swap" rel="stylesheet">
    @stack(('styles'))
</head>
<body>
<div id="preloader">
    <div id="loader"></div>
</div>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img style="width: 160px;" src="{{ asset('assets/images/tahmix-logo.png') }}" alt="image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            </i>
            <div class="toggle-wrap">
              <span class="toggle-bar"></span>
            </div>
          </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="features.html">Gizlilik Politikası</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Kullanım Koşulları</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn puprple_btn" href="download.html"> <span class="btn_text">İLETİŞİM</span> <i class="icofont-arrow-right btn_arrow"></i> </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
@yield('content')
@include('layouts.footer')
