<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Posyandu - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8; /* Warna latar belakang yang lebih terang */
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 900px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            margin-top: 50px;
            border: 1px solid #dcdfe6; /* Menambahkan border halus */
        }

        .login-card .card-header {
            background-color: #3f51b5; /* Warna biru untuk header */
            color: white;
            padding: 20px;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
        }

        .login-card .card-body {
            padding: 40px;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 15px;
            font-size: 16px;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #3f51b5; /* Biru untuk tombol login */
            border: none;
        }

        .btn {
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
        }

        .btn-primary {
            width: 100%;
        }

        .text-muted {
            font-size: 14px;
        }

        img.img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            object-fit: cover;
        }

        .card-body .row {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .col-md-4 img {
            max-width: 250px;
            margin-right: 30px;
        }

        .col-md-8 {
            padding-left: 30px;
        }

        .forgot-password {
            font-size: 14px;
            color: #3f51b5;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card login-card">
            <div class="card-header">
                LOGIN SYSTEM
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Gambar Dokter -->
                        <img src="path_to_your_doctor_image.png" alt="Doctor Image" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-center mb-3">Login</h4>
                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="forgot-password">Forgot Password?</a>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
