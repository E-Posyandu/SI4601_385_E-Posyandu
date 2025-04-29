@extends('admin-side.layout-admin.app')

@section('content')
<div class="container py-4" style="max-width: 1200px; margin-left: 20px; margin-right: 20px; background-color: #e9edf8; min-height: 100vh;">
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <h4 class="mb-4 fw-bold">Artikel & Edukasi</h4>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('artikel.create') }}" class="btn btn-primary mb-3 rounded-3">Tambah Artikel</a>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
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
                                <td class="fw-semibold">{{ $artikel->judul }}</td>
                                <td>{{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}</td>
                                <td>{{ $artikel->author }}</td>
                                <td>
                                    @if($artikel->is_show)
                                        <span class="badge bg-success-subtle text-success fw-medium rounded-pill px-3 py-2">Disetujui</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning fw-medium rounded-pill px-3 py-2">Menunggu</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('artikel.show', ['id' => $artikel->id_artikel]) }}" class="btn btn-info btn-sm rounded-3">Lihat</a>

                                    <a href="{{ route('artikel.edit', ['id' => $artikel->id_artikel]) }}" class="btn btn-warning btn-sm rounded-3">Edit</a>

                                    <form action="{{ route('artikel.destroy', ['id' => $artikel->id_artikel]) }}" method="POST" style="display:inline;" id="delete-form-{{ $artikel->id_artikel }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm rounded-3" onclick="confirmDelete({{ $artikel->id_artikel }})" dusk="delete-button-{{ $artikel->id_artikel }}">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($artikels->isEmpty())
                    <p class="text-center text-muted py-4">Belum ada artikel.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection

