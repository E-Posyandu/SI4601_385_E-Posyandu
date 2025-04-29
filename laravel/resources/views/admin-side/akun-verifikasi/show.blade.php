@extends('admin-side.layout-admin.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background-color: #00bcd4; border-color: #00bcd4;">
            <h6 class="m-0 font-weight-bold text-white">Detail Akun Balita</h6>
            <a href="{{ route('verifikasi-akun.index') }}" class="btn btn-sm btn-light">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header text-white" style="background-color: #00bcd4;">
                            <h6 class="m-0 font-weight-bold">Informasi Balita</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>Nama Balita</strong></td>
                                    <td>{{ $balita->nama_balita }}</td>
                                </tr>
                                <tr>
                                    <td><strong>NIK Anak</strong></td>
                                    <td>{{ $balita->nik_anak }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Lahir</strong></td>
                                    <td>
                                        @if($balita->tanggal_lahir)
                                            {{ \Carbon\Carbon::parse($balita->tanggal_lahir)->format('d/m/Y') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Kelamin</strong></td>
                                    <td>{{ $balita->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header text-white" style="background-color: #00bcd4;">
                            <h6 class="m-0 font-weight-bold">Informasi Orangtua</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>Nama Orangtua</strong></td>
                                    <td>{{ $balita->orangtua->nama_orangtua ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>{{ $balita->orangtua->email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>No. Telepon</strong></td>
                                    <td>{{ $balita->orangtua->no_telp ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header text-white" style="background-color: #00bcd4;">
                    <h6 class="m-0 font-weight-bold">Status Verifikasi</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-{{ $balita->status_akun == 'approved' ? 'success' : ($balita->status_akun == 'rejected' ? 'danger' : 'warning') }}">
                        <strong>
                            @if($balita->status_akun == 'approved')
                                <i class="fas fa-check-circle"></i> DISETUJUI
                            @elseif($balita->status_akun == 'rejected')
                                <i class="fas fa-times-circle"></i> DITOLAK
                            @else
                                <i class="fas fa-clock"></i> MENUNGGU VERIFIKASI
                            @endif
                        </strong>
                    </div>

                    @if($balita->status_akun == 'waiting')
<form action="{{ route('verifikasi-akun.update-status', $balita->id_balita) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="catatan">Catatan Verifikasi</label>
        <textarea name="catatan" id="catatan" class="form-control" rows="3"></textarea>
    </div>
    <div class="text-right mt-3">
        <button type="submit" name="status" value="approved" class="btn btn-success mr-2">
            <i class="fas fa-check"></i> Setujui
        </button>
        <button type="submit" name="status" value="rejected" class="btn btn-danger">
            <i class="fas fa-times"></i> Tolak
        </button>
    </div>
</form>
@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
