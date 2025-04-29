@extends('admin-side.layout-admin.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Databoard</h1>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Akun verifikasi</h5>
        <div class="d-flex">
            <!-- Search Box -->
            <div class="search-box me-3">
                <form action="{{ route('verifikasi-akun.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Cari nama/email/NIK..."
                               value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Filter Dropdown -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                        id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                    <li>
                        <a class="dropdown-item {{ !request('status') ? 'active' : '' }}"
                           href="{{ route('verifikasi-akun.index') }}">
                            Semua Status
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ request('status') == 'waiting' ? 'active' : '' }}"
                           href="{{ route('verifikasi-akun.index', ['status' => 'waiting']) }}">
                            <span class="badge bg-warning me-1">●</span> Menunggu
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ request('status') == 'approved' ? 'active' : '' }}"
                           href="{{ route('verifikasi-akun.index', ['status' => 'approved']) }}">
                            <span class="badge bg-success me-1">●</span> Disetujui
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ request('status') == 'rejected' ? 'active' : '' }}"
                           href="{{ route('verifikasi-akun.index', ['status' => 'rejected']) }}">
                            <span class="badge bg-danger me-1">●</span> Ditolak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-body">
        @if($balitas->isEmpty())
            <div class="alert alert-info text-center">
                Tidak ada data yang ditemukan.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>No Telephone</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($balitas as $balita)
                        <tr>
                            <td><strong>{{ $balita->nama_balita }}</strong></td>
                            <td>{{ $balita->orangtua->email ?? '-' }}</td>
                            <td>{{ $balita->orangtua->no_telp ?? '-' }}</td>
                            <td>
                                @if($balita->status_akun == 'approved')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($balita->status_akun == 'rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-warning">Menunggu</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
<!-- 1. View - Redirect ke detail -->
<li>
    <a class="dropdown-item" href="{{ route('verifikasi-akun.show', $balita->id_balita) }}">
        <i class="fas fa-eye me-2"></i> View
    </a>
</li>

<!-- 2. Setujui - Update status -->
<li>
    <form action="{{ route('verifikasi-akun.update-status', $balita->id_balita) }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="approved">
        <button type="submit" class="dropdown-item text-success">
            <i class="fas fa-check me-2"></i> Setujui
        </button>
    </form>
</li>

<!-- 3. Tolak - Update status -->
<li>
    <form action="{{ route('verifikasi-akun.update-status', $balita->id_balita) }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="rejected">
        <button type="submit" class="dropdown-item text-danger">
            <i class="fas fa-times me-2"></i> Tolak
        </button>
    </form>
</li>


                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $balitas->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
