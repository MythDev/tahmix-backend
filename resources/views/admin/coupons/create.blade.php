@extends('admin.layouts.app')
@section('title', 'TAHMİX | Yeni Kupon Oluştur')
@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between my-3">
            <h2 class="fs-18 mb-0">Yeni Kupon Oluştur</h2>
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-light"><i class="ri-arrow-left-line"></i> Listeye Dön</a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.coupons.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Sol Kolon: Kupon Genel Bilgileri -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header"><h5 class="card-title mb-0">Kupon Bilgileri</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Kupon Başlığı <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Örn: Günün Banko Kuponu, VIP Kombine" required value="{{ old('title') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kupon Türü</label>
                                <select name="is_premium" class="form-select">
                                    <option value="0">🆓 Ücretsiz Kupon (Herkes Görür)</option>
                                    <option value="1">⭐ VIP Kupon (Sadece Premiumlar)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Durum</label>
                                <select name="status" class="form-select">
                                    <option value="pending">⏳ Bekliyor</option>
                                    <option value="won">✅ Kazandı</option>
                                    <option value="lost">❌ Kaybetti</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Güven Yüzdesi (%)</label>
                                <input type="number" name="confidence" class="form-control" value="85" min="0" max="100">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Açıklama / Not</label>
                                <textarea name="note" class="form-control" rows="3" placeholder="Kupon analizi veya notu...">{{ old('note') }}</textarea>
                            </div>
                            <div class="alert alert-primary mb-0 text-center">
                                <span class="fs-13">Hesaplanan Toplam Oran:</span>
                                <h3 id="display_total_odds" class="text-primary mb-0 font-weight-bold">1.00</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sağ Kolon: Kupona Maç Ekleme -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Kupondaki Maçlar</h5>
                            <button type="button" class="btn btn-sm btn-success" onclick="addMatchRow()"><i class="ri-add-line"></i> Maç Ekle</button>
                        </div>
                        <div class="card-body">
                            <div id="matches-container">
                                <!-- Satırlar buraya JS ile eklenecek -->
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary px-4"><i class="ri-save-line"></i> Kuponu Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Dinamik Maç Satırı Şablonu -->
    <template id="match-row-template">
        <div class="match-row card border mb-3 p-3 bg-light position-relative">
            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" onclick="removeMatchRow(this)"><i class="ri-close-line"></i></button>
            <div class="row g-2 align-items-center">
                <div class="col-md-5">
                    <label class="form-label fs-12 mb-1">Maç Seç</label>
                    <select name="matches[INDEX][match_id]" class="form-select match-select" required>
                        <option value="">-- Maç Seçin --</option>
                        @foreach($matches as $m)
                            <option value="{{ $m->id }}">
                                {{ $m->match_date->format('d.m H:i') }} | {{ $m->home_team }} vs {{ $m->away_team }} ({{ $m->league_name }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fs-12 mb-1">Tahmin</label>
                    <select name="matches[INDEX][prediction]" class="form-select" required>
                        <option value="">-- Tahmin --</option>
                        <optgroup label="Maç Sonucu">
                            <option value="MS 1">MS 1</option>
                            <option value="MS X">MS X</option>
                            <option value="MS 2">MS 2</option>
                        </optgroup>
                        <optgroup label="Çifte Şans">
                            <option value="ÇŞ 1-X">ÇŞ 1-X</option>
                            <option value="ÇŞ 1-2">ÇŞ 1-2</option>
                            <option value="ÇŞ X-2">ÇŞ X-2</option>
                        </optgroup>
                        <optgroup label="Karşılıklı Gol">
                            <option value="KG Var">KG Var</option>
                            <option value="KG Yok">KG Yok</option>
                        </optgroup>
                        <optgroup label="Alt / Üst">
                            <option value="1.5 Üst">1.5 Üst</option>
                            <option value="1.5 Alt">1.5 Alt</option>
                            <option value="2.5 Üst">2.5 Üst</option>
                            <option value="2.5 Alt">2.5 Alt</option>
                            <option value="3.5 Üst">3.5 Üst</option>
                            <option value="3.5 Alt">3.5 Alt</option>
                        </optgroup>
                        <optgroup label="İlk Yarı Sonucu">
                            <option value="İY 1">İY 1</option>
                            <option value="İY X">İY X</option>
                            <option value="İY 2">İY 2</option>
                        </optgroup>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fs-12 mb-1">Oran</label>
                    <input type="number" step="0.01" name="matches[INDEX][odds]" class="form-control odds-input" placeholder="1.50" required oninput="calculateTotalOdds()">
                </div>
            </div>
        </div>
    </template>

    <script>
        let rowIndex = 0;

        function addMatchRow() {
            const container = document.getElementById('matches-container');
            const template = document.getElementById('match-row-template').innerHTML;
            const html = template.replace(/INDEX/g, rowIndex++);
            container.insertAdjacentHTML('beforeend', html);
            calculateTotalOdds();
        }

        function removeMatchRow(btn) {
            btn.closest('.match-row').remove();
            calculateTotalOdds();
        }

        function calculateTotalOdds() {
            const oddsInputs = document.querySelectorAll('.odds-input');
            let total = 1.0;
            let count = 0;

            oddsInputs.forEach(input => {
                const val = parseFloat(input.value);
                if (!isNaN(val) && val > 0) {
                    total *= val;
                    count++;
                }
            });

            if (count === 0) total = 1.0;
            document.getElementById('display_total_odds').innerText = total.toFixed(2);
        }

        // Sayfa açıldığında başlangıç için 2 boş maç satırı ekleyelim
        document.addEventListener("DOMContentLoaded", function () {
            addMatchRow();
            addMatchRow();
        });
    </script>
@endsection
