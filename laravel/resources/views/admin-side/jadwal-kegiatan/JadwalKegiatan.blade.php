@extends('admin-side.layout-admin.app')

@section('title', 'Jadwal Kegiatan')

@section('content')
<main class="p-4">
    <div class="container-fluid">
        <div class="row">
          
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Update Jadwal</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jadwal-kegiatan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                                <select class="form-select" id="jenis_kegiatan" name="jenis_kegiatan">
                                    <option selected disabled>Pilih Jenis Kegiatan</option>
                                    <option value="Pengecekan Umum">Pengecekan Umum</option>
                                    <option value="Imunisasi">Imunisasi</option>
                                    <option value="Vaksin">Vaksin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan">
                            </div>
                           
                            <input type="hidden" name="id_petugasKader" value="1">
                            <input type="hidden" name="id_posyandu" value="1">
                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                <button type="reset" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-3">January</h6>
                      
                        <div class="mb-3 text-center">
                            <small>02 Januari 2024 | <strong>Pengecekan Umum Balita</strong></small>
                        </div>
                        <div id="calendar" class="text-center border rounded p-3">
                            <p><em>Kalender interaktif di sini</em></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</main>
@endsection
``
