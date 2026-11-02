@extends(('admin.layouts.app'))
@section('title', 'Patimuya | VIP Bayi Kullanıcı Yönetimi')
@section('content')
    <div class="container-fluid">
        <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
            <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">VIP Bayi Kullanıcı Yönetimi</h2>
            <div class="flex-shrink-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">VIP Bayi Kullanıcıları</li>
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
                <h5 class="card-title mb-0">
                    <i class="ri-user-star-line text-warning"></i> Kullanıcı Onay Yönetimi
                </h5>
                <a href="{{ route('admin.vip-dealer-matches.index') }}" class="btn btn-sm btn-outline-primary">
                    <i class="ri-file-list-line"></i> VIP Bayi Maçlarına Git
                </a>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="ri-information-line"></i>
                    <strong>Kullanıcı Onayı:</strong> Onayladığınız kullanıcılar VIP Bayi maçlarını görüntüleyebilir.
                    Onay vermek için kullanıcının bayi numaranız ile maç oynadığını kanıtlayan görüntüyü WhatsApp'tan almanız gerekir.
                </div>

                <div class="table-responsive">
                    <table id="buttons-datatables" class="table table-nowrap table-striped table-bordered w-100 dataTable no-footer">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kullanıcı</th>
                            <th>E-posta</th>
                            <th>Kayıt Tarihi</th>
                            <th>Premium</th>
                            <th>VIP Bayi Onayı</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    @if($user->avatar)
                                        <img src="{{ $user->avatar }}" width="32" height="32" class="rounded-circle me-2" alt="{{ $user->name }}">
                                    @else
                                        <div class="avatar-xs d-inline-block me-2">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </span>
                                        </div>
                                    @endif
                                    <strong>{{ $user->name }}</strong>
                                    @if($user->google_id)
                                        <span class="badge bg-info ms-1" title="Google ile giriş yaptı">
                                            <i class="ri-google-fill"></i>
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    @if($user->is_premium)
                                        <span class="badge bg-warning text-dark">
                                            <i class="ri-vip-crown-fill"></i> Premium
                                        </span>
                                        @if($user->premium_until)
                                            <br><small class="text-muted">{{ $user->premium_until->format('d.m.Y') }}'e kadar</small>
                                        @endif
                                    @else
                                        <span class="badge bg-secondary">Free</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->is_vip_dealer_approved)
                                        <span class="badge bg-success">
                                            <i class="ri-checkbox-circle-fill"></i> Onaylı
                                        </span>
                                        @if($user->vip_dealer_approved_at)
                                            <br><small class="text-muted">{{ $user->vip_dealer_approved_at->format('d.m.Y') }}</small>
                                        @endif
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="ri-close-circle-fill"></i> Onaysız
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.vip-dealer-users.edit', $user->id) }}" class="btn btn-sm btn-primary" title="Düzenle">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <form action="{{ route('admin.vip-dealer-users.toggle-approval', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm {{ $user->is_vip_dealer_approved ? 'btn-danger' : 'btn-success' }}" title="{{ $user->is_vip_dealer_approved ? 'Onayı Kaldır' : 'Onayla' }}">
                                                <i class="{{ $user->is_vip_dealer_approved ? 'ri-close-line' : 'ri-check-line' }}"></i>
                                            </button>
                                        </form>
                                    </div>
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
