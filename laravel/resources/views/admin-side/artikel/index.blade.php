@extends('admin-side.layout-admin.app')

@section('content')
<div class="container" style="max-width: 1200px; margin-left: 20px; margin-right: 20px;">
    <h1 class="mb-4">Artikel & Edukasi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('artikel.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>

    <table class="table">
        <thead>
            <tr>
                <th>Judul Artikel</th>
                <th>Tanggal Upload</th>
                <th>Author</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artikels as $artikel)
                <tr>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->created_at->format('d M Y') }}</td>
                    <td>{{ $artikel->author }}</td>
                    <td>
                        @if($artikel->is_show)
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-warning">Menunggu</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('artikel.edit', ['id' => $artikel->id_artikel]) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('artikel.destroy', ['id' => $artikel->id_artikel]) }}" method="POST" style="display:inline;" id="delete-form-{{ $artikel->id_artikel }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $artikel->id_artikel }})">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus artikel ini??')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
