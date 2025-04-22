@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Verifikasi Akun Registrasi</h2>
    
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('verifikasi-akun.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama, email, atau NIK..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>Waiting</option>
                                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if($balitas->isEmpty())
                <div class="alert alert-info">
                    Belum ada data registrasi.
                </div>
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
                                <tr>
                                    <td>{{ $balita->nama_balita }}</td>
                                    <td>{{ $balita->nik_anak }}</td>
                                    <td>{{ $balita->orangtua->email ?? '-' }}</td>
                                    <td>{{ $balita->orangtua->no_telp ?? '-' }}</td>
                                    <td>
                                        <span class="badge" style="background-color: {{ $balita->status_akun_warna }}">
                                            
                                            {{ $balita->status_akun_text }}
                                        </span>
                                    </td>
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