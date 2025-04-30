@extends('admin-side.layout-admin.app')

@section('title', 'Data Posyandu')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Data Posyandu</h3>

        {{-- Tombol Tambah --}}
        <div class="mb-3 text-end">
            <a href="{{ route('posyandu.create') }}" class="btn btn-success" dusk="tambah-posyandu">+ Tambah Posyandu</a>
        </div>

        {{-- Flash Message --}}
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
                            <th>Nama Posyandu</th>
                            <th>Alamat</th>
                            <th>Admin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posyandus as $index => $posyandu)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $posyandu->nama_posyandu }}</td>
                                <td>{{ $posyandu->alamat_posyandu }}</td>
                                <td>{{ $posyandu->admin->id_admin }}</td>
                                <td>
                                    <a href="{{ route('posyandu.edit', $posyandu->id_posyandu) }}" class="btn btn-sm btn-primary" dusk="edit-posyandu">Edit</a>
                                    <form action="{{ route('posyandu.destroy', $posyandu->id_posyandu) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" dusk="delete-posyandu-{{ $posyandu->id_posyandu }}">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data posyandu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
