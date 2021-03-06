<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Auth::check())
        <meta name="user_id" content="{{ Auth::user()->id }}" />
    @endif

<!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{asset('thema/plugins/fontawesome-free/css/all.min.css')}}>
    <link rel="stylesheet" href={{asset('thema/plugins/fontawesome/css/fontawesome.min.css')}}>
    <link rel="stylesheet" href={{asset('thema/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}>

    <!-- Theme style -->
    <link rel="stylesheet" href={{asset('thema/dist/css/adminlte.min.css')}}>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="./img/logo.png" alt="Donor Panel" height="60" width="60">
    </div>

@include('donor.partials.topbar')

<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link text-center">
            <span class="brand-text font-weight-light">Panel Donations</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info text-center">
                    <a href="#" class="d-block">
                        {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
        @include('donor.partials.left-sidebar')
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
    @include('admin.partials.title-header')

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div id="app">
                    <app></app>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
@include('admin.partials.footer')
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('thema/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('thema/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('thema/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('thema/js/adminlte.min.js')}}"></script>
</body>
</html>
<script>
    import App from "../../js/vue/app";
    export default {
        components: {App}
    }
</script>
