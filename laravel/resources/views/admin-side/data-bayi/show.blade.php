@extends('admin-side.layout-admin.app')

@section('title', 'Detail Balita')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Detail Biodata Balita</h3>
        <div class="row">
            <!-- Kolom Kiri: Biodata & Laporan -->
            <div class="col-md-4">
                <!-- Biodata Balita -->
                <div class="card mb-4">
                    <div class="card-header">Biodata Balita</div>
                    <div class="card-body">
                        <p><strong>Nama:</strong> {{ $balita->nama_balita }}</p>
                        <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($balita->tanggal_lahir)->format('d-m-Y') }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $balita->jenis_kelamin }}</p>
                        <p><strong>Golongan Darah:</strong> {{ $balita->golongan_darah }}</p>
                    </div>
                </div>

                <!-- Laporan Perkembangan -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Laporan Perkembangan</span>
                        <a href="{{ route('report-perkembangan.index', ['id_balita' => $balita->id_balita]) }}" class="btn btn-primary btn-sm">+ Buat Laporan Baru</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>File Report</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($balita->reportPerkembangan as $report)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($report->tanggal)->isoFormat('MMMM YYYY') }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="btn btn-sm btn-info">Download</a>
                                            <form action="{{ route('report-perkembangan.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Belum ada laporan perkembangan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Grafik -->
            <div class="col-md-8">
                <!-- Grafik Berat Badan -->
                <div class="card mb-4">
                    <div class="card-header">Grafik Berat Badan</div>
                    <div class="card-body">
                        <canvas id="beratChart" height="150"></canvas>
                    </div>
                </div>

                <!-- Grafik Tinggi Badan -->
                <div class="card mb-4">
                    <div class="card-header">Grafik Tinggi Badan</div>
                    <div class="card-body">
                        <canvas id="tinggiChart" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json($kunjungan->pluck('bulan'));
    const dataBerat = @json($kunjungan->pluck('berat_badan'));
    const dataTinggi = @json($kunjungan->pluck('tinggi_badan'));

    // Grafik Berat Badan
    const ctxBerat = document.getElementById('beratChart').getContext('2d');
    new Chart(ctxBerat, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Berat Badan (kg)',
                data: dataBerat,
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Grafik Pertumbuhan Berat Badan'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Kg'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan Penimbangan'
                    }
                }
            }
        }
    });

    // Grafik Tinggi Badan
    const ctxTinggi = document.getElementById('tinggiChart').getContext('2d');
    new Chart(ctxTinggi, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Tinggi Badan (cm)',
                data: dataTinggi,
                fill: false,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Grafik Pertumbuhan Tinggi Badan'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cm'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan Penimbangan'
                    }
                }
            }
        }
    });
</script>
@endsection
