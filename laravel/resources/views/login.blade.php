<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Posyandu - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo-container {
            margin-top: 20px;
            text-align: center;
        }

        .login-card {
            width: 100%;
            max-width: 900px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border: 1px solid #dcdfe6; 
            margin: 20px auto;
        }

        .login-card .card-header {
            background-color: #00bcd4;
            color: white;
            padding: 20px;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            border-radius: 15px 15px 0 0 !important;
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
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #00bcd4;
            border: none;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #0097a7;
        }

        .btn {
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
        }

        .btn-block {
            width: 100%;
        }

        .alert-danger {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .login-card {
                margin: 20px 15px;
                padding: 10px;
            }

            .col-md-4, .col-md-8 {
                flex: 1 0 100%;
                padding: 10px;
            }
            
            .col-md-4 {
                text-align: center;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="{{ asset('assets/jpg2png/logo.png') }}" alt="Posyandu Logo" class="img-fluid" width="250">
    </div>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="card login-card">
            <div class="card-header">
                LOGIN SYSTEM
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/jpg2png/login.png') }}" alt="Doctor Image" class="img-fluid" width="250">
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-center mb-3">Login</h4>
                        
                        <!-- Error Message -->
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        
                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="#" class="text-decoration-none">Lupa Password?</a>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
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