@extends('admin-side.layout-admin.app')

@section('title', 'Detail Balita')

@section('content')
<main>
    <div class="container-fluid px-4 mt-4">
        <h3 class="mb-4">Detail Biodata Balita</h3>
        <div class="row">
            <!-- Biodata Balita -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">Biodata Balita</div>
                    <div class="card-body">
                        <p><strong>Nama:</strong> {{ $balita->nama_balita }}</p>
                        <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($balita->tanggal_lahir)->format('d-m-Y') }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $balita->jenis_kelamin }}</p>
                        <p><strong>Golongan Darah:</strong> {{ $balita->golongan_darah }}</p>
                    </div>
                </div>
            </div>

            <!-- Grafik Perkembangan -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">Grafik Berat Badan</div>
                    <div class="card-body">
                        <canvas id="beratChart" height="150"></canvas>
                        <!-- Include Chart.js dari CDN -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                            // Ambil data dari controller yang sudah dilempar
                            const labels = @json($kunjungan->pluck('bulan'));
                            const dataBerat = @json($kunjungan->pluck('berat_badan'));

                            const ctx = document.getElementById('beratChart').getContext('2d');
                            const beratChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: labels, // label sumbu X
                                    datasets: [{
                                        label: 'Berat Badan (kg)',
                                        data: dataBerat, // data Y
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
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Laporan Perkembangan -->
        <div class="card mb-5">
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
                        <!-- Tambahkan dummy data lainnya jika perlu -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection




