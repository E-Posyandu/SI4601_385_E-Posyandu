<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Posyandu - @yield('title', 'Dashboard - SB Admin')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
    <link href="{{ url('css/styles.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f5f9;
        }
        #layoutSidenav_content {
            margin-left: 250px;
            padding: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #d1d5db;
            padding: 8px;
            font-size: 14px;
        }
        .btn-primary {
            background-color: #3b82f6;
            border: none;
            border-radius: 5px;
            padding: 8px 20px;
        }
        .btn-danger {
            background-color: #f87171;
            border: none;
            border-radius: 5px;
            padding: 8px 20px;
        }
        #calendar {
            max-width: 100%;
            margin: 0 auto;
        }
        .text-muted {
            font-size: 14px;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    @include('admin-side.layout-admin.navbar')
    <div id="layoutSidenav">
        @include('admin-side.layout-admin.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('admin-side.layout-admin.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('js/scripts.js') }}"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    @yield('scripts')
</body>
</html>