<!DOCTYPE html>
<html lang="en">

<head>

    <title>Sistem Manajemen Klinik | dr. Eddy</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
    <meta name="author" content="Codedthemes" />

    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('template/assets/plugins/animation/css/animate.min.css') }}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/clinic.png') }}"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('calendar/style.css') }}">
    <link rel="stylesheet" href="{{ asset('calendar/theme.css') }}">

    @yield('css')
</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
     
    <!-- [ navigation menu ] start -->
    @include('layout.sidebar')
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    @include('layout.header')
    <!-- [ Header ] end -->



    @yield('content')
    <!-- [ Main Content ] start -->
   
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="{{ asset('template/assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/pcoded.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('calendar/calendar.min.js') }}"></script>
    @yield('js')

    <script>
        $('.table').DataTable();
        $('.calendar-container').calendar({
            date: new Date() // today
        });
    </script>
</body>

</html>

