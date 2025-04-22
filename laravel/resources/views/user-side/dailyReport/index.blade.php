@extends('user-side.layout-user.app')

@section('title', 'Data Bayi')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Laporan Harian - {{ $balita->nama_balita }}</h1>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Kalender -->
        <div class="mb-4">
            <label for="tanggal" class="form-label">Pilih Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ $selectedDate }}"
                onchange="window.location.href='{{ route('user-side.dailyReport.index', ['id_balita' => $balita->id_balita]) }}?tanggal='+this.value;">
        </div>

        <!-- Daftar Laporan -->
        <h3>History Report</h3>
        @if ($reports->isEmpty())
            <div class="alert alert-warning">Tidak ada laporan untuk tanggal ini.</div>
        @else
            @foreach ($reports as $report)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Daily Report {{ $loop->iteration }}</h5>
                        <p class="card-text"><strong>Tanggal:</strong> {{ $report->tanggal }}</p>
                        <p class="card-text"><strong>Catatan:</strong> {{ Str::limit($report->catatan, 250) }}</p>
                        <a href="{{ route('user-side.dailyReport.show', ['id' => $report->id_daily_reports]) }}" class="btn btn-primary">Lihat Detail</a>
                        <!-- <a href="{{ route('user-side.dailyReport.edit', ['id' => $report->id_daily_reports]) }}" class="btn btn-success">Edit</a> -->
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Tombol Tambah -->
        <a href="{{ route('user-side.dailyReport.create', ['id_balita' => $balita->id_balita]) }}" class="btn btn-info position-fixed" style="bottom: 20px; right: 20px;">
            <i class="fas fa-plus"></i> Tambah Laporan
        </a>
    </div>
</main>
@endsection