@extends('layout-admin.app')

@section('content')
    <div class="container">
        <h1>Verifikasi akun</h1>

        <form action="{{ route('artikel.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="admin">nama_admin</label>
                <input type="text" name="admin" id="judul" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan verifikasi</button>
        </form>
    </div>
@endsection