<!-- resources/views/admin-side/vitamin/create.blade.php -->
@extends('admin-side.vitamin.app')

@section('title', 'Tambah Vitamin')

@section('content')
    <form action="{{ route('vitamin.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_vitamin" class="form-label">Nama Vitamin</label>
            <input type="text" name="nama_vitamin" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
[l]