@extends('admin-side.layout-admin.app')

@section('content')
<div class="row">
    <!-- Form Update Jadwal -->
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Update Jadwal</h5>
            </div>
            <div class="card-body">
                
                <form action="{{ route('jadwal-kegiatan.update', $jadwal) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Nama Kegiatan -->
                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan', $jadwal->nama_kegiatan) }}" required>
                        @error('nama_kegiatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jenis Kegiatan -->
                    <div class="mb-3">
                        <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                        <select class="form-select" id="jenis_kegiatan" name="jenis_kegiatan" required>
                            <option value="">Pilih Jenis Kegiatan</option>
                            <option value="Pengecekan Umum Balita" {{ old('jenis_kegiatan', $jadwal->jenis_kegiatan) == 'Pengecekan Umum Balita' ? 'selected' : '' }}>Pengecekan Umum Balita</option>
                            <option value="Imunisasi" {{ old('jenis_kegiatan', $jadwal->jenis_kegiatan) == 'Imunisasi' ? 'selected' : '' }}>Imunisasi</option>
                            <option value="Vaksin" {{ old('jenis_kegiatan', $jadwal->jenis_kegiatan) == 'Vaksin' ? 'selected' : '' }}>Vaksin</option>
                        </select>
                        @error('jenis_kegiatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Kegiatan -->
                    <div class="mb-3">
                        <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan', $jadwal->tanggal_kegiatan) }}" required>
                        @error('tanggal_kegiatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- id_petugasKader -->
                    <div class="mb-3">
                        <label for="id_petugas_kader" class="form-label">Petugas</label>
                        <input type="number" class="form-control" id="id_petugas_kader" name="id_petugas_kader" value="{{ old('id_petugas_kader', $jadwal->id_petugas_kader) }}" required>
                        @error('id_petugas_kader')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- id_posyandu -->
                    <div class="mb-3">
                        <label for="id_posyandu" class="form-label">Posyandu</label>
                        <input type="number" class="form-control" id="id_posyandu" name="id_posyandu" value="{{ old('id_posyandu', $jadwal->id_posyandu) }}" required>
                        @error('id_posyandu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus jadwal ini?')){ document.getElementById('form-delete').submit(); }" class="btn btn-danger">
                            Hapus
                        </a>
                    </div>
                </form>

                <!-- Form Hapus (terpisah) -->
                <form id="form-delete" action="{{ route('jadwal-kegiatan.destroy', $jadwal) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
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
            events: [
                {
                    title: 'Acara Mendatang',
                    start: '2024-01-20',
                    description: 'Pengecekan Imunisasi Balita'
                }
            ]
        });
        calendar.render();
    });
</script>
@endsection
