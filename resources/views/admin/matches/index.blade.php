@extends(('admin.layouts.app'))
@section('title', 'Paşa Analiz | Maçlar')
@section('content')
    <div class="container-fluid">
        <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
            <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">Maç Yönetimi</h2>
            <div class="flex-shrink-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Maçlar</li>
                    </ol>
                </nav>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"> VIP ve Ücretsiz Maçlar </h5>
                <form action="{{ route('admin.matches.index') }}" method="GET">
                    {{-- API-Football tetikleme butonu ekleyebilirsin --}}
                </form>
            </div>
            <div class="card-body">
                <p class="text-muted mb-4">Sistem üzerinden çekilen maçlar burada listelenir. Tahmin girmek için "Düzenle" butonunu kullanın.</p>
                <div class="table-responsive">
                    {{-- Senin temandaki DataTables ID ve class'ları --}}
                    <table id="buttons-datatables" class="table table-nowrap table-striped table-bordered w-100 dataTable no-footer">
                        <thead>
                        <tr>
                            <th>Tarih / Saat</th>
                            <th>Lig</th>
                            <th>Karşılaşma</th>
                            <th>Tahmin & Oran</th>
                            <th>Tür (VIP)</th>
                            <th>Durum</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($matches as $match)
                            <tr>
                                <td>
                                    {{ $match->match_date->format('d.m.Y H:i') }}
                                </td>
                                <td>
                                    <img src="{{ $match->league_logo }}" width="20" class="me-2">
                                    {{ $match->league_name }}
                                </td>
                                <td>
                                    <strong>{{ $match->home_team }}</strong> <br>
                                    <span class="text-muted">vs</span> <br>
                                    <strong>{{ $match->away_team }}</strong>
                                </td>
                                <td>
                                    @if($match->prediction)
                                        <span class="badge bg-primary">{{ $match->prediction }}</span> <br>
                                        <small class="text-muted">Oran: {{ $match->odds }}</small>
                                    @else
                                        <span class="badge bg-secondary">Tahmin Girilmedi</span>
                                    @endif
                                </td>
                                <td>
                                    @if($match->is_premium)
                                        <span class="badge bg-warning text-dark"><i class="ri-star-fill"></i> V.I.P Maç</span>
                                    @else
                                        <span class="badge bg-success">Ücretsiz Maç</span>
                                    @endif
                                </td>
                                <td>
                                    @if($match->prediction_status == 'won')
                                        <span class="badge bg-success">Kazandı</span>
                                    @elseif($match->prediction_status == 'lost')
                                        <span class="badge bg-danger">Kaybetti</span>
                                    @else
                                        <span class="badge bg-secondary">Bekliyor</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.matches.edit', $match->id) }}" class="btn btn-sm btn-primary">
                                        Düzenle / Tahmin Gir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="assets/js/table/datatable.init.js"></script>
@endpush
