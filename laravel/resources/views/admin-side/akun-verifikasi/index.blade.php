@extends('admin-side.akun-verifikasi.app')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Verifikasi Akun Pendaftar</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" 
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" 
                     aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item {{ request('status') == 'waiting' ? 'active' : '' }}" 
                       href="{{ route('verifikasi-akun.index', ['status' => 'waiting']) }}">
                        <i class="fas fa-clock text-warning mr-2"></i> Menunggu
                    </a>
                    <a class="dropdown-item {{ request('status') == 'approved' ? 'active' : '' }}" 
                       href="{{ route('verifikasi-akun.index', ['status' => 'approved']) }}">
                        <i class="fas fa-check text-success mr-2"></i> Disetujui
                    </a>
                    <a class="dropdown-item {{ request('status') == 'rejected' ? 'active' : '' }}" 
                       href="{{ route('verifikasi-akun.index', ['status' => 'rejected']) }}">
                        <i class="fas fa-times text-danger mr-2"></i> Ditolak
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if($balitas->isEmpty())
                    <div class="alert alert-info text-center">
                        Tidak ada data yang ditemukan.
                    </div>
                @else
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Balita</th>
                                <th>NIK Anak</th>
                                <th>Email Orangtua</th>
                                <th>No. Telp</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($balitas as $balita)
                            <tr>
                                <td>{{ $balita->nama_balita }}</td>
                                <td>{{ $balita->nik_anak }}</td>
                                <td>{{ $balita->orangtua->email ?? '-' }}</td>
                                <td>{{ $balita->orangtua->no_telp ?? '-' }}</td>
                                <td>
                                    @if($balita->status_akun == 'approved')
                                        <span class="badge badge-success">Disetujui</span>
                                    @elseif($balita->status_akun == 'rejected')
                                        <span class="badge badge-danger">Ditolak</span>
                                    @else
                                        <span class="badge badge-warning">Menunggu</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('verifikasi-akun.show', $balita->id_balita) }}" 
                                       class="btn btn-sm btn-info" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $balitas->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection