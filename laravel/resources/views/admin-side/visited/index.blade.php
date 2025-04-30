@extends('admin-side.layout-admin.app')

@section('title', 'Data Kunjungan')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Data Kunjungan Balita</h3>

        {{-- Form Pencarian --}}
        <form method="GET" action="{{ route('visited.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama balita..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        {{-- Tombol Tambah Data --}}
        <div class="mb-3 text-end">
            <a href="{{ route('visited.create') }}" class="btn btn-success" dusk="tambah-visited">+ Tambah Kunjungan</a>
        </div>

        {{-- Session Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tabel Data --}}
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Balita</th>
                            <th>Tanggal Penimbangan</th>
                            <th>Berat Badan (kg)</th>
                            <th>Tinggi Badan (cm)</th>
                            <th>Lingkar Kepala (cm)</th>
                            <th>Lingkar Lengan (cm)</th>
                            <th>ASI Eksklusif</th>
                            <th>Posyandu</th>
                            <th>Petugas Kader</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($visiteds as $index => $visit)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $visit->balita->nama_balita ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($visit->tanggal_penimbangan)->format('d-m-Y') }}</td>
                                <td>{{ $visit->berat_badan }}</td>
                                <td>{{ $visit->tinggi_badan }}</td>
                                <td>{{ $visit->lingkar_kepala }}</td>
                                <td>{{ $visit->lingkat_lengan }}</td>
                                <td>{{ $visit->asi_esklusif ? 'Ya' : 'Tidak' }}</td>
                                <td>{{ $visit->posyandu->nama_posyandu ?? '-' }}</td>
                                <td>{{ $visit->petugas->nama_petugas ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('visited.edit', $visit->id_kunjungan) }}" dusk=edit-visited class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('visited.destroy', $visit->id_kunjungan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" dusk="delete-kunjungan-{{ $visit->id_kunjungan }}">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">Belum ada data kunjungan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
