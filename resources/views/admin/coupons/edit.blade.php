@extends('admin.layouts.app')
@section('title', 'TAHMİX | Kuponu Düzenle')
@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between my-3">
            <h2 class="fs-18 mb-0">Kuponu Düzenle: {{ $coupon->title }}</h2>
            <a href="{{ route('admin.coupons.index') }}" class="btn btn-light"><i class="ri-arrow-left-line"></i> Listeye Dön</a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header"><h5 class="card-title mb-0">Kupon Bilgileri</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Kupon Başlığı <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required value="{{ old('title', $coupon->title) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kupon Türü</label>
                                <select name="is_premium" class="form-select">
                                    <option value="0" {{ $coupon->is_premium == 0 ? 'selected' : '' }}>🆓 Ücretsiz Kupon</option>
                                    <option value="1" {{ $coupon->is_premium == 1 ? 'selected' : '' }}>⭐ VIP Kupon</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kupon Genel Durumu</label>
                                <select name="status" class="form-select">
                                    <option value="pending" {{ $coupon->status == 'pending' ? 'selected' : '' }}>⏳ Bekliyor</option>
                                    <option value="won" {{ $coupon->status == 'won' ? 'selected' : '' }}>✅ Kazandı (WON)</option>
                                    <option value="lost" {{ $coupon->status == 'lost' ? 'selected' : '' }}>❌ Kaybetti (LOST)</option>
                                    <option value="void" {{ $coupon->status == 'void' ? 'selected' : '' }}>İptal (VOID)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Güven Yüzdesi (%)</label>
                                <input type="number" name="confidence" class="form-control" value="{{ old('confidence', $coupon->confidence) }}" min="0" max="100">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Açıklama / Not</label>
                                <textarea name="note" class="form-control" rows="3">{{ old('note', $coupon->note) }}</textarea>
                            </div>
                            <div class="alert alert-primary mb-0 text-center">
                                <span class="fs-13">Hesaplanan Toplam Oran:</span>
                                <h3 id="display_total_odds" class="text-primary mb-0 font-weight-bold">{{ number_format($coupon->total_odds, 2) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Kupondaki Maçlar</h5>
                            <button type="button" class="btn btn-sm btn-success" onclick="addMatchRow()"><i class="ri-add-line"></i> Maç Ekle</button>
                        </div>
                        <div class="card-body">
                            <div id="matches-container">
                                @php
                                    $predictions = [
                                        'Maç Sonucu' => ['MS 1', 'MS X', 'MS 2'],
                                        'Çifte Şans' => ['ÇŞ 1-X', 'ÇŞ 1-2', 'ÇŞ X-2'],
                                        'Karşılıklı Gol' => ['KG Var', 'KG Yok'],
                                        'Toplam Gol Alt / Üst' => ['1.5 Alt', '1.5 Üst', '2.5 Alt', '2.5 Üst', '3.5 Alt', '3.5 Üst', '4.5 Alt', '4.5 Üst'],
                                        'İlk Yarı Sonucu' => ['İY 1', 'İY X', 'İY 2'],
                                        'İlk Yarı Alt / Üst' => ['İY 0.5 Alt', 'İY 0.5 Üst', 'İY 1.5 Alt', 'İY 1.5 Üst'],
                                        'İlk Yarı / Maç Sonucu' => ['1/1', '1/X', '1/2', 'X/1', 'X/X', 'X/2', '2/1', '2/X', '2/2']
                                    ];
                                @endphp

                                @foreach($coupon->couponMatches as $index => $cm)
                                    <div class="match-row card border mb-3 p-3 bg-light position-relative">
                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" onclick="removeMatchRow(this)"><i class="ri-close-line"></i></button>
                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-5">
                                                <label class="form-label fs-12 mb-1">Maç Seç</label>
                                                <select name="matches[{{ $index }}][match_id]" class="form-select" required>
                                                    @foreach($matches as $m)
                                                        <option value="{{ $m->id }}" {{ $cm->match_id == $m->id ? 'selected' : '' }}>
                                                            {{ $m->match_date->format('d.m H:i') }} | {{ $m->home_team }} vs {{ $m->away_team }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fs-12 mb-1">Tahmin</label>
                                                <select name="matches[{{ $index }}][prediction]" class="form-select" required>
                                                    <option value="">-- Tahmin --</option>
                                                    @foreach($predictions as $group => $items)
                                                        <optgroup label="{{ $group }}">
                                                            @foreach($items as $item)
                                                                <option value="{{ $item }}" {{ $cm->prediction == $item ? 'selected' : '' }}>{{ $item }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                    {{-- Eğer listede olmayan özel bir şey varsa --}}
                                                    @if(!in_array($cm->prediction, array_merge(...array_values($predictions))))
                                                        <option value="{{ $cm->prediction }}" selected>{{ $cm->prediction }} (Özel)</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label fs-12 mb-1">Oran</label>
                                                <input type="number" step="0.01" name="matches[{{ $index }}][odds]" class="form-control odds-input" value="{{ $cm->odds }}" required oninput="calculateTotalOdds()">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label fs-12 mb-1">Sonuç</label>
                                                <select name="matches[{{ $index }}][status]" class="form-select form-select-sm">
                                                    <option value="pending" {{ $cm->status == 'pending' ? 'selected' : '' }}>⏳</option>
                                                    <option value="won" {{ $cm->status == 'won' ? 'selected' : '' }}>✅</option>
                                                    <option value="lost" {{ $cm->status == 'lost' ? 'selected' : '' }}>❌</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary px-4"><i class="ri-save-line"></i> Değişiklikleri Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <template id="match-row-template">
        <div class="match-row card border mb-3 p-3 bg-light position-relative">
            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" onclick="removeMatchRow(this)"><i class="ri-close-line"></i></button>
            <div class="row g-2 align-items-center">
                <div class="col-md-5">
                    <label class="form-label fs-12 mb-1">Maç Seç</label>
                    <select name="matches[INDEX][match_id]" class="form-select" required>
                        <option value="">-- Maç Seçin --</option>
                        @foreach($matches as $m)
                            <option value="{{ $m->id }}">{{ $m->match_date->format('d.m H:i') }} | {{ $m->home_team }} vs {{ $m->away_team }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fs-12 mb-1">Tahmin</label>
                    <select name="matches[INDEX][prediction]" class="form-select" required>
                        <option value="">-- Tahmin --</option>
                        @foreach($predictions as $group => $items)
                            <optgroup label="{{ $group }}">
                                @foreach($items as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fs-12 mb-1">Oran</label>
                    <input type="number" step="0.01" name="matches[INDEX][odds]" class="form-control odds-input" placeholder="1.50" required oninput="calculateTotalOdds()">
                </div>
                <div class="col-md-2">
                    <label class="form-label fs-12 mb-1">Sonuç</label>
                    <select name="matches[INDEX][status]" class="form-select form-select-sm">
                        <option value="pending">⏳</option>
                        <option value="won">✅</option>
                        <option value="lost">❌</option>
                    </select>
                </div>
            </div>
        </div>
    </template>

    <script>
        let rowIndex = {{ $coupon->couponMatches->count() + 10 }};

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
    </script>
@endsection
