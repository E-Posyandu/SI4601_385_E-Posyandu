@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Update Jadwal</h5>
                </div>
                <div class="card-body">
                    <!-- Form untuk update jadwal -->
                    <form action="{{ route('jadwal-kegiatan.update', $jadwal->id) }}" method="POST">
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

                        <!-- Tombol Simpan dan Hapus -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <form action="{{ route('jadwal-kegiatan.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection