@extends(('admin.layouts.app'))
@section('title', 'Patimuya | Kullanıcı Düzenle')
@section('content')
    <div class="container-fluid">
        <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
            <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">Kullanıcı Düzenle</h2>
            <div class="flex-shrink-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.vip-dealer-users.index') }}">Kullanıcılar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Düzenle</li>
                    </ol>
                </nav>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            @if($user->avatar)
                                <img src="{{ $user->avatar }}" width="32" height="32" class="rounded-circle me-2" alt="{{ $user->name }}">
                            @endif
                            {{ $user->name }}
                            @if($user->google_id)
                                <span class="badge bg-info ms-2">
                                    <i class="ri-google-fill"></i> Google
                                </span>
                            @endif
                        </h5>
                        <p class="text-muted mt-2 mb-0">
                            <i class="ri-mail-line"></i> {{ $user->email }} |
                            <i class="ri-calendar-line"></i> Kayıt: {{ $user->created_at->format('d.m.Y H:i') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.vip-dealer-users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <!-- AD SOYAD -->
                                <div class="col-xxl-6">
                                    <label for="name" class="form-label">Ad Soyad <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required>
                                </div>

                                <!-- E-POSTA -->
                                <div class="col-xxl-6">
                                    <label for="email" class="form-label">E-posta <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
                                </div>

                                <hr class="my-4">

                                <!-- VIP BAYİ ONAYI -->
                                <div class="col-12">
                                    <div class="card border-warning">
                                        <div class="card-header bg-warning bg-opacity-10">
                                            <h6 class="mb-0">
                                                <i class="ri-vip-crown-line text-warning"></i> VIP Bayi Onay Durumu
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check form-switch form-switch-lg">
                                                <input class="form-check-input" type="checkbox" role="switch" id="is_vip_dealer_approved" name="is_vip_dealer_approved" value="1" {{ old('is_vip_dealer_approved', $user->is_vip_dealer_approved) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_vip_dealer_approved">
                                                    <strong>VIP Bayi Maçlarını Görüntüleyebilir</strong>
                                                </label>
                                            </div>
                                            <p class="text-muted mt-2 mb-0">
                                                <i class="ri-information-line"></i>
                                                Bu kullanıcı onaylandığında, mobil uygulamada "VIP Bayi Maçlarımız" sekmesindeki maçları görüntüleyebilir.
                                            </p>
                                            @if($user->vip_dealer_approved_at)
                                                <p class="text-success mt-2 mb-0">
                                                    <i class="ri-checkbox-circle-fill"></i>
                                                    Onay Tarihi: {{ $user->vip_dealer_approved_at->format('d.m.Y H:i') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- KULLANICI BİLGİLERİ (Salt Okunur) -->
                                <div class="col-12">
                                    <div class="card border-info">
                                        <div class="card-header bg-info bg-opacity-10">
                                            <h6 class="mb-0">
                                                <i class="ri-information-line text-info"></i> Kullanıcı Bilgileri
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="mb-2">
                                                        <strong>Premium Durumu:</strong>
                                                        @if($user->is_premium)
                                                            <span class="badge bg-warning text-dark">Premium</span>
                                                            @if($user->premium_until)
                                                                <br><small class="text-muted">{{ $user->premium_until->format('d.m.Y') }}'e kadar</small>
                                                            @endif
                                                        @else
                                                            <span class="badge bg-secondary">Free</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-2">
                                                        <strong>Giriş Yöntemi:</strong>
                                                        @if($user->google_id)
                                                            <span class="badge bg-info">
                                                                <i class="ri-google-fill"></i> Google
                                                            </span>
                                                        @else
                                                            <span class="badge bg-primary">
                                                                <i class="ri-mail-fill"></i> E-posta
                                                            </span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="ri-save-line"></i> Kaydet
                                </button>
                                <a href="{{ route('admin.vip-dealer-users.index') }}" class="btn btn-light ms-2">İptal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
