@extends('layout-admin.app')

@section('content')
    <div class="container">
        <h1>Buat Artikel Kesehatan Baru</h1>

        <form action="{{ route('artikel.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="author">Penulis</label>
                <input type="text" name="author" id="author" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="is_show">Tampilkan Artikel?</label>
                <select name="is_show" id="is_show" class="form-control" required>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Artikel</button>
        </form>
    </div>
@endsection
