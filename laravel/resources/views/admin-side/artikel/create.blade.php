@extends('admin-side.layout-admin.app')

@section('content')
<div class="container" style="max-width: 800px; margin-left: 20px; margin-right: 20px;">
    <h1 class="mb-4">Artikel Rilis</h1>

    <div class="card shadow-sm p-4 bg-white rounded">
        <form action="{{ route('artikel.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_show" id="is_show" class="form-check-input">
                <label for="is_show" class="form-check-label">Tampilkan</label>
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">Konten</label>
                <textarea name="isi" id="isi" class="form-control" rows="6" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
