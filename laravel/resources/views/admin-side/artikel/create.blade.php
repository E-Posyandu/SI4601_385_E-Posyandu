@extends('admin-side.layout-admin.app')

@section('content')
<div class="container" style="max-width: 800px; margin-left: 20px; margin-right: 20px;">
    <h1 class="mb-4">Artikel Rilis</h1>

    <form action="{{ route('artikel.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="is_show" class="form-label">Tampilkan</label>
            <input type="checkbox" name="is_show" id="is_show" class="form-check-input">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea name="isi" id="content" class="form-control" rows="6" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    console.log('TinyMCE script loaded');
    tinymce.init({
        selector: '#content',
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        setup: function(editor) {
            console.log('TinyMCE initialized');
        }
    });
</script>
