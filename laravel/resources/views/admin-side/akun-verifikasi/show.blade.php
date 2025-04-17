@extends('admin-side.akun-verifikasi.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Detail Verifikasi Akun</h6>
            <a href="{{ route('verifikasi-akun.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h6 class="m-0 font-weight-bold">Informasi Balita</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Nama Balita</dt>
                                <dd class="col-sm-8">{{ $balita->nama_balita }}</dd>
                                
                                <dt class="col-sm-4">NIK Anak</dt>
                                <dd class="col-sm-8">{{ $balita->nik_anak }}</dd>
                                
                                <dt class="col-sm-4">Tanggal Lahir</dt>
                                <dd class="col-sm-8">{{ $balita->tanggal_lahir->format('d/m/Y') }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h6 class="m-0 font-weight-bold">Informasi Orangtua</h6>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Nama Orangtua</dt>
                                <dd class="col-sm-8">{{ $balita->orangtua->nama_orangtua ?? '-' }}</dd>
                                
                                <dt class="col-sm-4">Email</dt>
                                <dd class="col-sm-8">{{ $balita->orangtua->email ?? '-' }}</dd>
                                
                                <dt class="col-sm-4">No. Telepon</dt>
                                <dd class="col-sm-8">{{ $balita->orangtua->no_telp ?? '-' }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
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
                        @if($balita->catatan_verifikasi)
                            <hr>
                            <p class="mb-0"><strong>Catatan:</strong> {{ $balita->catatan_verifikasi }}</p>
                        @endif
                    </div>

                    @if($balita->status_akun == 'waiting')
                    <form action="{{ route('verifikasi-akun.update-status', $balita->id_balita) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="catatan">Catatan Verifikasi</label>
                            <textarea name="catatan" id="catatan" class="form-control" rows="3" 
                                placeholder="Masukkan catatan jika diperlukan..."></textarea>
                        </div>
                        <div class="text-right">
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