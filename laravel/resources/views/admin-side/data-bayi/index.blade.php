@extends('admin-side.layout-admin.app')

@section('title', 'Dashboard')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Data Balita</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('babies.create') }}" class="btn btn-primary mb-3">+ Tambah Balita</a>

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
                                <td>{{ $baby->tinggi_badan }}</td>
                                <td>{{ $baby->berat_badan }}</td>
                                <td>
                                    <a href="{{ route('babies.edit', $baby->id_balita) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('babies.destroy', $baby->id_balita) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
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
