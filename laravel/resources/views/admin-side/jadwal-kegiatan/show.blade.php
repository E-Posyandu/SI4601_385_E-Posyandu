@extends('admin-side.layout-admin.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Detail Jadwal</h5>
            </div>
            <div class="card-body">
                <!-- Nama Kegiatan -->
                <div class="mb-3">
                    <label class="form-label">Nama Kegiatan</label>
                    <p class="form-control-plaintext">{{ $jadwalKegiatan->nama_kegiatan }}</p>
                </div>

                <!-- Jenis Kegiatan -->
                <div class="mb-3">
                    <label class="form-label">Jenis Kegiatan</label>
                    <p class="form-control-plaintext">{{ $jadwalKegiatan->jenis_kegiatan }}</p>
                </div>

                <!-- Tanggal Kegiatan -->
                <div class="mb-3">
                    <label class="form-label">Tanggal Kegiatan</label>
                    <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($jadwalKegiatan->tanggal_kegiatan)->format('d M Y') }}</p>
                </div>

                <!-- ID Petugas Kader -->
                <div class="mb-3">
                    <label class="form-label">Petugas</label>
                    <p class="form-control-plaintext">{{ $jadwalKegiatan->id_petugasKader }}</p>
                </div>

                <!-- ID Posyandu -->
                <div class="mb-3">
                    <label class="form-label">Posyandu</label>
                    <p class="form-control-plaintext">{{ $jadwalKegiatan->id_posyandu }}</p>
                </div>

                <!-- Tombol Kembali -->
                <a href="{{ route('jadwal-kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

    <!-- Kalender -->
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <div id="calendar"></div>
                <p class="mt-3 text-muted">Acara: {{ $jadwalKegiatan->nama_kegiatan }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [
                {
                    title: '{{ $jadwalKegiatan->nama_kegiatan }}',
                    start: '{{ $jadwalKegiatan->tanggal_kegiatan }}'
                }
            ]
        });
        calendar.render();
    });
</script>
@endsection
