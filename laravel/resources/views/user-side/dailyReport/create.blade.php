@extends('user-side.layout-user.app')

@section('title', 'Tambah Laporan Harian')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Tambah Laporan Harian - {{ $balita->nama_balita }}</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('user-side.dailyReport.store', ['id_balita' => $balita->id_balita]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan:</label>
                <textarea id="catatan" name="catatan" class="form-control" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Laporan</button>
            <a href="{{ route('user-side.dailyReport.index', ['id_balita' => $balita->id_balita]) }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</main>
@endsection