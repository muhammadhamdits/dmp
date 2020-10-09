@extends('layout.app')

@section('head')
<link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<style>
    .gambar{
        width: 100%;
        /* height: 100px; */
        padding-top: 100%;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endsection

@section('body')
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle mr-2"></i> 
                        {{ auth()->guard('owner')->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                        <a href="{{ route('auth.profile') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> 
                            Profile
                        </a>
                        <a href="{{ route('auth.logout') }}" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> 
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Marketplace</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('owner.index') }}" class="nav-link active">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p>
                                    Items
                                    <span class="right badge badge-danger">{{ App\Pemilik::where('status', 0)->count() }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('owner.orders') }}" class="nav-link">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>
                                    Orders
                                    <span class="right badge badge-danger">{{ App\Pemilik::where('status', 1)->count() }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('owner.history') }}" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Transaction History
                                    <span class="right badge badge-danger">{{ App\Pemilik::where('status', 2)->count() }}</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2020 <a href="">Hamdio</a>.</strong> All rights reserved.
        </footer>
    </div>
    @yield('modal')
@endsection

@section('foot')
    <script src="{{ url('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    @yield('script')
@endsection