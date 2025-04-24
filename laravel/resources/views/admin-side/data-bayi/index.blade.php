@extends('admin-side.layout-admin.app')

@section('title', 'Data Bayi')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Data Balita</h3>

        <form method="GET" action="{{ route('balita.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama balita..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>


        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Balita</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Tinggi Badan (cm)</th>
                            <th>Berat Badan (kg)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($balita as $index => $baby)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $baby->nama_balita }}</td>
                                <td>{{ \Carbon\Carbon::parse($baby->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $baby->jenis_kelamin }}</td>
                                <td>{{ $baby->kunjunganTerakhir?->berat_badan ?? 'Belum ada data' }}</td>
                                <td>{{ $baby->kunjunganTerakhir?->tinggi_badan ?? 'Belum ada data' }}</td>
                                <td>
                                    <a href="{{ route('balita.show', $baby->id_balita) }}" class="btn btn-sm btn-info">Lihat Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data balita</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
