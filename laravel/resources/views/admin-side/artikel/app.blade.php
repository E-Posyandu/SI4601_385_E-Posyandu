<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel & Edukasi</title>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="{{ route('index') }}">Dashboard</a></li>
            <li><a href="{{ route('artikel.index') }}">Artikel & Edukasi</a></li>
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
