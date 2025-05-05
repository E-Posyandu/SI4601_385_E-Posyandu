@extends('admin-side.layout-admin.app')

@section('title', 'Tambah Vaksin')

@section('content')
    <form action="{{ route('vaksin.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_vaksin" class="form-label">Nama Vaksin</label>
            <input type="text" name="nama_vaksin" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection