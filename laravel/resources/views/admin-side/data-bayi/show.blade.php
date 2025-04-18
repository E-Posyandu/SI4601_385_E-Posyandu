@extends('admin-side.layout-admin.app')

@section('title', 'Detail Balita')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Detail Biodata Balita</h3>
        <div class="row">
            <!-- Kolom Kiri: Biodata + Laporan -->
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
                        <button class="btn btn-primary">+ Buat Laporan Baru</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>File Report</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Januari 2025</td>
                                    <td><a href="#" class="btn btn-sm btn-info">Download</a></td>
                                </tr>
                                <tr>
                                    <td>Februari 2025</td>
                                    <td><a href="#" class="btn btn-sm btn-info">Download</a></td>
                                </tr>
                                <tr>
                                    <td>Maret 2025</td>
                                    <td><a href="#" class="btn btn-sm btn-info">Download</a></td>
                                </tr>
                                <!-- Tambahkan data lainnya jika ada -->
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
    const beratChart = new Chart(ctxBerat, {
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
                    min: 6,
                    max: 15,
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
    const tinggiChart = new Chart(ctxTinggi, {
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
                    min: 60,
                    max: 100,
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
