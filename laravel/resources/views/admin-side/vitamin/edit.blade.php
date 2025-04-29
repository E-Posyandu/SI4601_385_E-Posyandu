@extends('admin-side.vitamin.app')

@section('title', 'Edit Vitamin')

@section('content')
    <form action="{{ route('vitamin.update', $vitamin->id_vitamin) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_vitamin" class="form-label">Nama Vitamin</label>
            <input type="text" name="nama_vitamin" class="form-control" value="{{ $vitamin->nama_vitamin }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection