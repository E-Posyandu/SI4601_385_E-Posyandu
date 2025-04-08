<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard E-Posyandu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>Selamat Datang di Dashboard</h1>
    <p>Login sebagai: <strong>{{ session('admin')->username }}</strong></p>
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
