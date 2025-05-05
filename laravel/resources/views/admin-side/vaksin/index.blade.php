@extends('admin-side.layout-admin.app')
@section('title', 'Daftar Vaksin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Vaksin</h2>
        <a href="{{ route('vaksin.create') }}" class="btn btn-primary">+ Tambah Vaksin</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered bg-white">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Vaksin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vaksin as $v)
                    <tr>
                        <td>{{ $v->id_vaksin }}</td>
                        <td>{{ $v->nama_vaksin }}</td>
                        <td>
                            <a href="{{ route('vaksin.edit', $v->id_vaksin) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('vaksin.destroy', $v->id_vaksin) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus vaksin ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection