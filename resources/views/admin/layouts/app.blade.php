<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Paşa Analiz | Admin Panel') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Paşa Analiz" name="description" />
    <meta content="Paşa Analiz" name="author" />
    <script type="module" src="{{ asset('admin/assets/js/layout-setup.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}">    <link rel="stylesheet" href="{{ asset('admin/assets/libs/gridjs/theme/mermaid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/simplebar/simplebar.min.css') }}">
    <link href="{{ asset('admin/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
    @stack(('styles'))
</head>
<body>
<div id="layout-wrapper">
    <header class="app-header" id="appHeader">
        <div class="container-fluid w-100">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-inline-flex align-items-center gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="align-items-end logo-main d-none me-5">
                        <img height="35" width="34" class="logo-dark" alt="Dark Logo" src="{{ asset('assets/images/tahmix-logo.png') }}">
                        <h3 class="text-body-emphasis fw-bolder mb-0 ms-1">Paşa Analiz</h3>
                    </a>
                    <button type="button" class="vertical-toggle btn header-btn" id="toggleSidebar" aria-label="Toggle Sidebar">
                        <i class="bi bi-arrow-bar-left header-icon"></i>
                    </button>
                    <button type="button" class="horizontal-toggle btn header-btn d-none" id="toggleHorizontal" aria-label="Toggle Menu">
                        <i class="ri-menu-2-line header-icon"></i>
                    </button>
                    <div class="form-icon right d-none d-md-block" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <input type="text" class="form-control form-control-icon bg-transparent rounded-pill min-w-300px" id="Search" placeholder="Arama yap..." required>
                        <div class="search-btn">
                            <div><i class="ri-search-line text-muted fs-16"></i></div>
                            <div><span class="badge bg-light-subtle text-muted">CTRL D</span></div>
                        </div>
                    </div>
                </div>
                <div class="flex-shrink-0 d-flex align-items-center gap-4">
                    <div class="d-flex gap-2 align-items-center">
                        <button class="btn header-btn d-block d-md-none" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="ri-search-line"></i>
                        </button>
                    </div>
                    <div class="dark-mode-btn" id="toggleMode">
                        <button class="btn header-btn active" id="lightModeBtn" type="button" aria-label="Switch to light mode">
                            <i class="bi bi-brightness-high"></i>
                        </button>
                        <button class="btn header-btn" id="darkModeBtn" type="button" aria-label="Switch to Dark mode">
                            <i class="bi bi-moon-stars"></i>
                        </button>
                    </div>
                    <div class="dropdown pe-dropdown-mega d-none d-md-block">
                        <button class="header-profile-btn btn gap-1 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-none d-xl-block pe-2">
                                <span class="d-block mb-0 fs-12 fw-semibold">{{ auth()->user()->name }}</span>
                                <span class="d-block mb-0 fs-10 text-muted">{{ auth()->user()->email }}</span>
                            </div>
                            <span class="header-btn btn position-relative">
                                    <img src="{{ asset('admin/assets/images/avatar/avatar-3.jpg') }}" alt="Avatar Image" class="img-fluid rounded-circle">
                                </span>
                        </button>
                        <div class="dropdown-menu dropdown-mega-sm header-dropdown-menu p-3">

                            <ul class="list-unstyled mb-1 border-bottom pb-1">
                                <li><a class="dropdown-item" href="pages-profile.html"><i class="bi bi-person me-2"></i> View Profile</a></li>
                                <li><a class="dropdown-item" href="pages-profile.html"><i class="bi bi-gear me-2"></i> Settings</a></li>
                                <li><a class="dropdown-item" href="pages-billing-subscription.html"><i class="bi bi-award me-2"></i> Subscription</a></li>
                            </ul>
                            <ul class="list-unstyled mb-1 border-bottom pb-1">
                                <li><a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-clock me-2"></i> ChangLog</a></li>
                                <li><a class="dropdown-item" href="pages-pricing.html"><i class="bi bi-currency-dollar"></i> Pricing</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-headset me-2"></i> Support</a></li>
                            </ul>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <form action="{{ route('admin.logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right me-2"></i> Çıkış Yap</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="modal fade search-modal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-block">
                    <div class="form-icon">
                        <input type="text" class="form-control form-control-icon" id="searchInputInModal" placeholder="Search" required>
                        <div class="search-btn w-44px">
                            <i class="ri-search-line text-muted fs-16"></i>
                        </div>
                        <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y d-inline-block m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body" data-simplebar id="list-items">
                    <ul class="list-unstyled mb-0" id="searchList"></ul>
                </div>
            </div>
        </div>
    </div>
    <aside class="pe-app-sidebar" id="sidebar">
        <div style="margin-top: 12%;" class="pe-app-sidebar-logo px-6 d-flex align-items-center position-relative">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-end logo-main justify-content-center">
                <img style="width: 100%; height: auto;" class="logo-dark" alt="Dark Logo" src="{{ asset('assets/images/tahmix-logo.png') }}">
                <img style="width: 100%; height: auto;" class="logo-light" alt="Light Logo" src="{{ asset('assets/images/tahmix-logo.png') }}">
            </a>
            <button type="button" id="sidebarDefaultArrow" class="btn btn-sm p-0 fs-16 text-body-emphasis ms-auto float-end d-none icon-hover-btn d-none"><i class="ri-arrow-right-line fs-5"></i></button>
        </div>
        <nav style="margin-top: 12%;" class="pe-app-sidebar-menu nav nav-pills" data-simplebar id="sidebar-simplebar">
            <div class="d-flex align-items-start flex-column w-100">
                <ul class="pe-main-menu list-unstyled">
                    <li class="pe-menu-title">GENEL</li>
                    <li class="pe-slide">
                        <a href="{{ route('admin.matches.index') }}" class="pe-nav-link">
                            <i class="ri-football-line pe-nav-icon"></i>
                            <span class="pe-nav-content">Maçlar</span>
                        </a>
                    </li>
                    <li class="pe-slide">
                        <a href="{{ route('admin.coupons.index') }}" class="pe-nav-link">
                            <i class="ri-football-line pe-nav-icon"></i>
                            <span class="pe-nav-content">Kuponlar</span>
                        </a>
                    </li>
                    <li class="pe-slide">
                        <a href="#" class="pe-nav-link">
                            <i class="ri-user-line pe-nav-icon"></i>
                            <span class="pe-nav-content">Kullanıcılar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <main class="app-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
@include('admin.layouts.footer')
