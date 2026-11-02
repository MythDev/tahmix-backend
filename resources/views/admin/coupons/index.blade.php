@extends('admin.layouts.app')
@section('title', 'TAHMİX | Hazır Kuponlar')
@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between my-3">
            <h2 class="fs-18 mb-0">Hazır Kupon Yönetimi</h2>
            <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary"><i class="ri-add-line"></i> Yeni Kupon Oluştur</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>Kupon Başlığı</th>
                            <th>Kupon Türü</th>
                            <th>İçerideki Maçlar</th>
                            <th>Toplam Oran</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                            <th class="text-end">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($coupons as $coupon)
                            <tr>
                                <td>
                                    <strong>{{ $coupon->title }}</strong>
                                    @if($coupon->note)
                                        <br><small class="text-muted">{{ Str::limit($coupon->note, 40) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($coupon->is_premium)
                                        <span class="badge bg-warning text-dark"><i class="ri-vip-crown-fill"></i> VIP</span>
                                    @else
                                        <span class="badge bg-success">Ücretsiz</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $coupon->couponMatches->count() }} Maç</span>
                                    <small class="text-muted d-block">
                                        @foreach($coupon->couponMatches->take(2) as $cm)
                                            {{ $cm->match->home_team ?? '?' }} - {{ $cm->match->away_team ?? '?' }} ({{ $cm->prediction }})<br>
                                        @endforeach
                                        @if($coupon->couponMatches->count() > 2)
                                            +{{ $coupon->couponMatches->count() - 2 }} maç daha
                                        @endif
                                    </small>
                                </td>
                                <td><strong class="text-primary fs-15">{{ number_format($coupon->total_odds, 2) }}</strong></td>
                                <td>
                                    @if($coupon->status == 'pending')
                                        <span class="badge bg-info">⏳ Bekliyor</span>
                                    @elseif($coupon->status == 'won')
                                        <span class="badge bg-success">✅ Kazandı</span>
                                    @elseif($coupon->status == 'lost')
                                        <span class="badge bg-danger">❌ Kaybetti</span>
                                    @else
                                        <span class="badge bg-dark">İptal</span>
                                    @endif
                                </td>
                                <td>{{ $coupon->created_at->format('d.m.Y H:i') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-sm btn-outline-primary"><i class="ri-edit-line"></i></a>
                                    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bu kuponu silmek istediğinize emin misiniz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"><i class="ri-delete-bin-line"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">Henüz oluşturulmuş bir kupon yok.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $coupons->links() }}
            </div>
        </div>
    </div>
@endsection
