@extends('admin-side.layout-admin.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Daftar Jadwal Kegiatan</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('jadwal-kegiatan.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Jenis Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Petugas</th>
                                <th>Posyandu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jadwals as $index => $item)
                            <!-- <pre>{{ print_r($jadwals) }}</pre> -->
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_kegiatan }}</td>
                                    <td>{{ $item->jenis_kegiatan }}</td>
                                    <td>{{ $item->tanggal_kegiatan }}</td>
                                    <td>{{ $item->id_petugas_kader }}</td>
                                    <td>{{ $item->id_posyandu }}</td>
                                    <td>
                                        @if (!empty($item->id_jadwal))
                                            <a href="{{ route('jadwal-kegiatan.edit', ['jadwal' => $item->id_jadwal]) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('jadwal-kegiatan.destroy', ['jadwal' => $item->id_jadwal]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @else
                                            <span class="text-danger">ID tidak valid</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada jadwal kegiatan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
