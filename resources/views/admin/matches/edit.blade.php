@extends(('admin.layouts.app'))
@section('title', 'TAHMİX | Maçı Düzenle')
@section('content')
    <div class="container-fluid">
        <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
            <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">Tahmin Gir & Düzenle</h2>
            <div class="flex-shrink-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.matches.index') }}">Maçlar</a></li>
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
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <img src="{{ $match->home_logo }}" width="24" class="me-2"> {{ $match->home_team }}
                            <span class="mx-2 text-muted">VS</span>
                            {{ $match->away_team }} <img src="{{ $match->away_logo }}" width="24" class="ms-2">
                        </h5>
                        <p class="text-muted mt-2 mb-0"><i class="ri-calendar-event-line"></i> {{ $match->match_date->format('d.m.Y H:i') }} | {{ $match->league_name }}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.matches.update', $match->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-4">
                                <!-- İDDAA KOMBİNASYON SEÇİMİ -->
                                <div class="col-xxl-6">
                                    <label for="prediction" class="form-label">Uzman Tahmini <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-select" id="prediction_select" onchange="applyPrediction(this.value)">
                                            <option value="">-- Hazır Kombinasyon Seç --</option>
                                            <optgroup label="Maç Sonucu (MS)">
                                                <option value="MS 1">MS 1 (Ev Sahibi Kazanır)</option>
                                                <option value="MS X">MS X (Beraberlik)</option>
                                                <option value="MS 2">MS 2 (Deplasman Kazanır)</option>
                                            </optgroup>
                                            <optgroup label="Çifte Şans (ÇŞ)">
                                                <option value="ÇŞ 1-X">ÇŞ 1-X (Ev Sahibi veya Beraberlik)</option>
                                                <option value="ÇŞ 1-2">ÇŞ 1-2 (Ev Sahibi veya Deplasman)</option>
                                                <option value="ÇŞ X-2">ÇŞ X-2 (Beraberlik veya Deplasman)</option>
                                            </optgroup>
                                            <optgroup label="Karşılıklı Gol (KG)">
                                                <option value="KG Var">KG Var (Karşılıklı Gol Var)</option>
                                                <option value="KG Yok">KG Yok (Karşılıklı Gol Yok)</option>
                                            </optgroup>
                                            <optgroup label="Toplam Gol Alt / Üst">
                                                <option value="1.5 Alt">1.5 Alt</option>
                                                <option value="1.5 Üst">1.5 Üst</option>
                                                <option value="2.5 Alt">2.5 Alt</option>
                                                <option value="2.5 Üst">2.5 Üst</option>
                                                <option value="3.5 Alt">3.5 Alt</option>
                                                <option value="3.5 Üst">3.5 Üst</option>
                                                <option value="4.5 Alt">4.5 Alt</option>
                                                <option value="4.5 Üst">4.5 Üst</option>
                                            </optgroup>
                                            <optgroup label="İlk Yarı Sonucu (İY)">
                                                <option value="İY 1">İY 1 (İlk Yarı Ev)</option>
                                                <option value="İY X">İY X (İlk Yarı Berabere)</option>
                                                <option value="İY 2">İY 2 (İlk Yarı Deplasman)</option>
                                            </optgroup>
                                            <optgroup label="İlk Yarı Alt / Üst">
                                                <option value="İY 0.5 Alt">İY 0.5 Alt</option>
                                                <option value="İY 0.5 Üst">İY 0.5 Üst</option>
                                                <option value="İY 1.5 Alt">İY 1.5 Alt</option>
                                                <option value="İY 1.5 Üst">İY 1.5 Üst</option>
                                            </optgroup>
                                            <optgroup label="İlk Yarı / Maç Sonucu (İY/MS)">
                                                <option value="1/1">1/1</option>
                                                <option value="1/X">1/X</option>
                                                <option value="1/2">1/2</option>
                                                <option value="X/1">X/1</option>
                                                <option value="X/X">X/X</option>
                                                <option value="X/2">X/2</option>
                                                <option value="2/1">2/1</option>
                                                <option value="2/X">2/X</option>
                                                <option value="2/2">2/2</option>
                                            </optgroup>
                                            <optgroup label="Ev Sahibi / Deplasman Özel">
                                                <option value="Ev Sahibi 1.5 Üst">Ev Sahibi 1.5 Üst</option>
                                                <option value="Ev Sahibi 2.5 Üst">Ev Sahibi 2.5 Üst</option>
                                                <option value="Deplasman 1.5 Üst">Deplasman 1.5 Üst</option>
                                                <option value="Deplasman 2.5 Üst">Deplasman 2.5 Üst</option>
                                            </optgroup>
                                        </select>
                                        <input type="text" name="prediction" id="prediction" class="form-control" value="{{ old('prediction', $match->prediction) }}" placeholder="Listeden seçin veya elle yazın">
                                    </div>
                                    <small class="text-muted">Listeden seçebilir veya manuel düzenleyebilirsiniz.</small>
                                </div>

                                <div class="col-xxl-6">
                                    <label for="odds" class="form-label">Oran</label>
                                    <input type="text" name="odds" class="form-control" id="odds" value="{{ old('odds', $match->odds) }}" placeholder="Örn: 1.85">
                                </div>
                                <div class="col-xxl-6">
                                    <label for="is_premium" class="form-label">Maç Türü (VIP mi?)</label>
                                    <select name="is_premium" id="is_premium" class="form-select">
                                        <option value="1" {{ old('is_premium', $match->is_premium) == 1 ? 'selected' : '' }}>⭐ VIP Maç (Sadece Premiumlar Görür)</option>
                                        <option value="0" {{ old('is_premium', $match->is_premium) == 0 ? 'selected' : '' }}>🆓 Ücretsiz Maç (Herkes Görür)</option>
                                    </select>
                                </div>
                                <div class="col-xxl-6">
                                    <label for="prediction_status" class="form-label">Tahmin Sonucu</label>
                                    <select name="prediction_status" id="prediction_status" class="form-select">
                                        <option value="pending" {{ old('prediction_status', $match->prediction_status) == 'pending' ? 'selected' : '' }}>⏳ Bekliyor (Maç Oynanmadı)</option>
                                        <option value="won" {{ old('prediction_status', $match->prediction_status) == 'won' ? 'selected' : '' }}>✅ Kazandı (WON)</option>
                                        <option value="lost" {{ old('prediction_status', $match->prediction_status) == 'lost' ? 'selected' : '' }}>❌ Kaybetti (LOST)</option>
                                    </select>
                                </div>

                                <hr class="my-4">
                                <div class="col-12 mb-2">
                                    <h5 class="mb-0 text-primary"><i class="ri-smartphone-line"></i> Mobil Uygulama Detayları (Match Details Ekranı)</h5>
                                </div>
                                <div class="col-xxl-4">
                                    <label for="confidence" class="form-label">Güven Yüzdesi (%)</label>
                                    <input type="number" name="confidence" class="form-control" id="confidence" value="{{ old('confidence', $match->confidence ?? 85) }}" min="0" max="100">
                                </div>
                                <div class="col-xxl-4">
                                    <label for="home_form" class="form-label">Ev Sahibi Form (Son 5 Maç)</label>
                                    <input type="text" name="home_form" class="form-control" id="home_form" value="{{ old('home_form', $match->home_form ?? 'W,W,D,L,W') }}" placeholder="Örn: W,W,L,D,W">
                                </div>
                                <div class="col-xxl-4">
                                    <label for="away_form" class="form-label">Deplasman Form (Son 5 Maç)</label>
                                    <input type="text" name="away_form" class="form-control" id="away_form" value="{{ old('away_form', $match->away_form ?? 'L,W,W,D,L') }}" placeholder="Örn: L,L,W,D,L">
                                </div>
                                <div class="col-12">
                                    <label for="analysis" class="form-label">Yapay Zeka / Uzman Analizi (AI Deep Analysis)</label>
                                    <textarea name="analysis" class="form-control" id="analysis" rows="4" placeholder="Maç hakkındaki detaylı yorumlarınızı buraya girin...">{{ old('analysis', $match->analysis) }}</textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary px-5"><i class="ri-save-line"></i> Kaydet ve Yayına Al</button>
                                <a href="{{ route('admin.matches.index') }}" class="btn btn-light ms-2">İptal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function applyPrediction(val) {
            if (val) {
                document.getElementById('prediction').value = val;
            }
        }
    </script>
@endsection
