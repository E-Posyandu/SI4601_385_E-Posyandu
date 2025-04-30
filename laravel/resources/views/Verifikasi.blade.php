@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Verifikasi Akun Registrasi</h2>

    <!-- Form Filter dan Pencarian -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('verifikasi-akun.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama, email, atau NIK..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-control">
                            <option value="">-- Semua Status --</option>
                            <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>Waiting</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="card">
        <div class="card-body">
            @if($balitas->isEmpty())
                <div class="alert alert-info">Belum ada data registrasi.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Balita</th>
                                <th>NIK Anak</th>
                                <th>Email Orangtua</th>
                                <th>No. Telp Orangtua</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($balitas as $balita)
                                @php
                                    $badgeClass = match($balita->status_akun) {
                                        'approved' => 'bg-success',
                                        'rejected' => 'bg-danger',
                                        'waiting' => 'bg-warning',
                                        default => 'bg-secondary',
                                    };
                                @endphp
                                <tr>
                                    <td>{{ $balita->nama_balita }}</td>
                                    <td>{{ $balita->nik_anak }}</td>
                                    <td>{{ $balita->orangtua->email ?? '-' }}</td>
                                    <td>{{ $balita->orangtua->no_telp ?? '-' }}</td>
                                    <td><span class="badge {{ $badgeClass }}">{{ ucfirst($balita->status_akun) }}</span></td>
                                    <td>
                                        @if($balita->status_akun == 'waiting')
                                            <div class="btn-group">
                                                <form action="{{ route('verifikasi-akun.update-status', $balita->id_balita) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                                <form action="{{ route('verifikasi-akun.update-status', $balita->id_balita) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $balitas->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
