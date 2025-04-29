@extends('admin-side.layout-admin.app')

@section('title', 'Tambah Posyandu')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Tambah Posyandu</h3>

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Tambah Posyandu --}}
        <div class="card">
            <div class="card-body">
                <form action="{{ route('posyandu.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_posyandu" class="form-label">Nama Posyandu</label>
                        <input type="text" name="nama_posyandu" class="form-control" id="nama_posyandu" value="{{ old('nama_posyandu') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_posyandu" class="form-label">Alamat Posyandu</label>
                        <textarea name="alamat_posyandu" class="form-control" id="alamat_posyandu" rows="3" required>{{ old('alamat_posyandu') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="id_admin" class="form-label">Pilih Admin</label>
                        <select name="id_admin" id="id_admin" class="form-select" required>
                            <option value="">-- Pilih Admin --</option>
                            @foreach ($admins as $admin)
                                <option value="{{ $admin->id_admin }}" {{ old('id_admin') == $admin->id_admin ? 'selected' : '' }}>
                                    {{ $admin->id_admin }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <a href="{{ route('posyandu.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
