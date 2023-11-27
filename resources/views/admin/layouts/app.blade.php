<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($header_title) ? $header_title :''}} - برونز عباية</title>
  
  <!-- خط جوجل: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- أيقونات فونت أوسوم -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- أيقونات IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- نمط الثيم -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  @yield('style')

        <!-- السكريبتات -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!--
خيارات تاغ الـ `body`:

  طبق واحدة أو أكثر من الكلاسات التالية على تاغ الـ body
  للحصول على التأثير المطلوب

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('admin.layouts.header')
  @yield('content')
  @include('admin.layouts.footer')

</div>
<!-- ./wrapper -->

<!-- السكريبتات المطلوبة -->

<!-- jQuery -->
<script src="{{ url('public/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{ url('public/assets/dist/js/adminlte.js')}}"></script>

<!-- سكريبتات اختيارية -->
<script src="{{ url('public/assets/plugins/chart.js/Chart.min.js')}}"></script>

@yield('script')
</body>
</html>
