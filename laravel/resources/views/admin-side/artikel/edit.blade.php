@extends('admin-side.layout-admin.app')

@section('content')
<div class="container" style="max-width: 800px; margin-left: 20px; margin-right: 20px;">
<div class="container">
    <h1>Edit Artikel</h1>
    <form action="{{ route('artikel.update', ['id' => $artikel->id_artikel]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $artikel->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Artikel</label>
            <textarea name="content" id="content" class="form-control" rows="6" required>{{ $artikel->isi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="is_show" class="form-label">Tampilkan</label>
            <input type="checkbox" name="is_show" id="is_show" class="form-check-input" {{ $artikel->is_show ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
