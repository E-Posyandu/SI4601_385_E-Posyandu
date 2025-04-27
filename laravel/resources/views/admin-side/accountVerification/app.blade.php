<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Posyandu </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            background-color: #f8f9fa;
            min-height: 100vh;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }
        .sidebar-logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 15px;
        }
        .nav-link {
            color: #495057;
            padding: 12px 20px;
            border-radius: 5px;
            margin: 5px 10px;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #e9ecef;
            color: #0d6efd;
        }
        .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        .main-content {
            padding: 20px;
            background-color: #ffffff;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar p-0">
                <div class="sidebar-header">
                    <img src="{{ asset('assets/jpg2png/logo.png') }}" alt="Posyandu Logo" class="sidebar-logo">
                    
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user-check"></i> Akun Verifikasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-baby"></i> Data Bayi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-calendar-alt"></i> Jadwal Kegiatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-newspaper"></i> Artikel & Edukasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-line"></i> Update Perkembangan
                        </a>
                    </li>
                </ul>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    
                </div>

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>