@extends('admin-side.layout-admin.app')

@section('title', 'Edit Vaksin')

@section('content')
    <form action="{{ route('vaksin.update', $vaksin->id_vaksin) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_vaksin" class="form-label">Nama Vaksin</label>
            <input type="text" name="nama_vaksin" class="form-control" value="{{ $vaksin->nama_vaksin }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection

