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
                <textarea name="isi" id="editor" class="form-control" rows="6"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<!-- Load TinyMCE dari CDN TinyCloud -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: '#editor',  // Target id textarea
        height: 400,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
                 'bold italic backcolor | alignleft aligncenter ' +
                 'alignright alignjustify | bullist numlist outdent indent | ' +
                 'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>

@endsection
