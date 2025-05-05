@extends('admin-side.layout-admin.app')
@section('title', 'Daftar Vitamin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Vitamin</h2>
        <a href="{{ route('vitamin.create') }}" class="btn btn-primary">+ Tambah Vitamin</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered bg-white">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Vitamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vitamin as $v)
                    <tr>
                        <td>{{ $v->id_vitamin }}</td>
                        <td>{{ $v->nama_vitamin }}</td>
                        <td>
                            <a href="{{ route('vitamin.edit', $v->id_vitamin) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('vitamin.destroy', $v->id_vitamin) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus vitamin ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
