@extends('admin-side.layout-admin.app')

@section('content')
<div class="row">
    <!-- Form Tambah Jadwal -->
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Tambah Jadwal</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('jadwal-kegiatan.store') }}" method="POST">
                    @csrf

                    <!-- Nama Kegiatan -->
                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required>
                        @error('nama_kegiatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jenis Kegiatan -->
                    <div class="mb-3">
                        <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                        <select class="form-select" id="jenis_kegiatan" name="jenis_kegiatan" required>
                            <option value="">Pilih Jenis Kegiatan</option>
                            <option value="Pengecekan Umum Balita" {{ old('jenis_kegiatan') == 'Pengecekan Umum Balita' ? 'selected' : '' }}>Pengecekan Umum Balita</option>
                            <option value="Imunisasi" {{ old('jenis_kegiatan') == 'Imunisasi' ? 'selected' : '' }}>Imunisasi</option>
                            <option value="Vaksin" {{ old('jenis_kegiatan') == 'Vaksin' ? 'selected' : '' }}>Vaksin</option>
                        </select>
                        @error('jenis_kegiatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Kegiatan -->
                    <div class="mb-3">
                        <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}" required>
                        @error('tanggal_kegiatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Petugas -->
                    <div class="mb-3">
                        <label for="id_petugas_kader" class="form-label">Petugas</label>
                        <select class="form-select" id="id_petugas_kader" name="id_petugas_kader" required>
                            <option value="">Pilih Petugas</option>
                            @foreach($petugas_kader as $petugas)
                                <option value="{{ $petugas->id_petugas_kader }}" {{ old('id_petugas_kader') == $petugas->id_petugas_kader ? 'selected' : '' }}>
                                    {{ $petugas->nama_petugas }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_petugas_kader')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Posyandu -->
                    <div class="mb-3">
                        <label for="id_posyandu" class="form-label">Posyandu</label>
                        <select class="form-select" id="id_posyandu" name="id_posyandu" required>
                            <option value="">Pilih Posyandu</option>
                            @foreach($posyandus as $posyandu)
                                <option value="{{ $posyandu->id_posyandu }}" {{ old('id_posyandu') == $posyandu->id_posyandu ? 'selected' : '' }}>
                                    {{ $posyandu->nama_posyandu }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_posyandu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Kalender -->
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <div id="calendar"></div>
                <p class="mt-3 text-muted">Acara Mendatang<br>Pengecekan Imunisasi Balita</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [] // Kosongkan karena belum ada data jadwal
        });
        calendar.render();
    });
</script>
@endsection
