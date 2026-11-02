@extends(('admin.layouts.app'))
@section('title', 'Patimuya | VIP Bayi Maçı Düzenle')
@section('content')
    <div class="container-fluid">
        <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
            <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">VIP Bayi Maçı Düzenle</h2>
            <div class="flex-shrink-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.vip-dealer-matches.index') }}">VIP Bayi Maçları</a></li>
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
                            <i class="ri-vip-crown-line text-warning"></i>
                            <img src="{{ $match->home_logo }}" width="24" class="me-2" alt="{{ $match->home_team }}"> {{ $match->home_team }}
                            <span class="mx-2 text-muted">VS</span>
                            {{ $match->away_team }} <img src="{{ $match->away_logo }}" width="24" class="ms-2" alt="{{ $match->away_team }}">
                        </h5>
                        <p class="text-muted mt-2 mb-0">
                            <i class="ri-calendar-event-line"></i> {{ $match->match_date->format('d.m.Y H:i') }} | {{ $match->league_name }}
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.vip-dealer-matches.update', $match->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <!-- TAHMİN -->
                                <div class="col-xxl-6">
                                    <label for="prediction" class="form-label">Uzman Tahmini <span class="text-danger">*</span></label>
                                    <input type="text" name="prediction" class="form-control" id="prediction" value="{{ old('prediction', $match->prediction) }}" placeholder="Örn: MS 1, Karşılıklı Gol Var">
                                </div>

                                <!-- ORAN -->
                                <div class="col-xxl-6">
                                    <label for="odds" class="form-label">Oran</label>
                                    <input type="text" name="odds" class="form-control" id="odds" value="{{ old('odds', $match->odds) }}" placeholder="Örn: 1.85">
                                </div>

                                <!-- VIP BAYİ DURUMU -->
                                <div class="col-xxl-6">
                                    <label for="is_vip_dealer" class="form-label">VIP Bayi Maçı mı?</label>
                                    <select name="is_vip_dealer" id="is_vip_dealer" class="form-select">
                                        <option value="1" {{ old('is_vip_dealer', $match->is_vip_dealer) == 1 ? 'selected' : '' }}>
                                            <i class="ri-vip-crown-line"></i> ✅ Evet (Sadece Onaylı Kullanıcılar Görür)
                                        </option>
                                        <option value="0" {{ old('is_vip_dealer', $match->is_vip_dealer) == 0 ? 'selected' : '' }}>
                                            ❌ Hayır (Normal Maç)
                                        </option>
                                    </select>
                                </div>

                                <!-- KUPON DURUMU -->
                                <div class="col-xxl-6">
                                    <label for="prediction_status" class="form-label">Tahmin Sonucu</label>
                                    <select name="prediction_status" id="prediction_status" class="form-select">
                                        <option value="pending" {{ old('prediction_status', $match->prediction_status) == 'pending' ? 'selected' : '' }}>⏳ Bekliyor (Maç Oynanmadı)</option>
                                        <option value="won" {{ old('prediction_status', $match->prediction_status) == 'won' ? 'selected' : '' }}>✅ Kazandı (WON)</option>
                                        <option value="lost" {{ old('prediction_status', $match->prediction_status) == 'lost' ? 'selected' : '' }}>❌ Kaybetti (LOST)</option>
                                    </select>
                                </div>

                                <hr class="my-4">

                                <!-- MOBİL UYGULAMA İÇİN DETAYLI ANALİZLER -->
                                <div class="col-12 mb-2">
                                    <h5 class="mb-0 text-primary"><i class="ri-smartphone-line"></i> Mobil Uygulama Detayları</h5>
                                </div>

                                <!-- GÜVEN YÜZDESİ -->
                                <div class="col-xxl-4">
                                    <label for="confidence" class="form-label">Güven Yüzdesi (%)</label>
                                    <input type="number" name="confidence" class="form-control" id="confidence" value="{{ old('confidence', $match->confidence ?? 85) }}" min="0" max="100">
                                </div>

                                <!-- HOME FORM -->
                                <div class="col-xxl-4">
                                    <label for="home_form" class="form-label">Ev Sahibi Form (Son 5 Maç)</label>
                                    <input type="text" name="home_form" class="form-control" id="home_form" value="{{ old('home_form', $match->home_form ?? 'W,W,D,L,W') }}" placeholder="Örn: W,W,L,D,W">
                                </div>

                                <!-- AWAY FORM -->
                                <div class="col-xxl-4">
                                    <label for="away_form" class="form-label">Deplasman Form (Son 5 Maç)</label>
                                    <input type="text" name="away_form" class="form-control" id="away_form" value="{{ old('away_form', $match->away_form ?? 'L,W,W,D,L') }}" placeholder="Örn: L,L,W,D,L">
                                </div>

                                <!-- ANALİZ METNİ -->
                                <div class="col-12">
                                    <label for="analysis" class="form-label">Yapay Zeka / Uzman Analizi</label>
                                    <textarea name="analysis" class="form-control" id="analysis" rows="4" placeholder="Maç hakkındaki detaylı yorumlarınızı buraya girin...">{{ old('analysis', $match->analysis) }}</textarea>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="ri-save-line"></i> Kaydet ve Yayına Al
                                </button>
                                <a href="{{ route('admin.vip-dealer-matches.index') }}" class="btn btn-light ms-2">İptal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
