<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Posyandu - <?php echo $__env->yieldContent('title', 'Dashboard - SB Admin'); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
    <link href="<?php echo e(url('css/styles.css')); ?>" rel="stylesheet">
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
    <?php echo $__env->make('admin-side.layout-admin.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div id="layoutSidenav">
        <?php echo $__env->make('admin-side.layout-admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div id="layoutSidenav_content">
            <main>
                <?php echo $__env->yieldContent('content'); ?>
            </main>
            <?php echo $__env->make('admin-side.layout-admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(url('js/scripts.js')); ?>"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH C:\laragon\www\SI4601_385_E-Posyandu\laravel\resources\views/admin-side/layout-admin/app.blade.php ENDPATH**/ ?>