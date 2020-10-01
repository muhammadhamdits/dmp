@extends('layout.app')

@section('head')
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
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user mr-2"></i> 
                        {{ auth()->guard('admin')->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
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
            <a href="index3.html" class="brand-link">
                <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Marketplace</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link active">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>
                                    Registered Store
                                    <span class="right badge badge-danger">{{ App\Pemilik::where('status', 0)->count() }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.acc') }}" class="nav-link">
                                <i class="nav-icon fas fa-check"></i>
                                <p>
                                    Accepted Store
                                    <span class="right badge badge-danger">{{ App\Pemilik::where('status', 1)->count() }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.rej') }}" class="nav-link">
                                <i class="nav-icon fas fa-times"></i>
                                <p>
                                    Rejected Store
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
@endsection