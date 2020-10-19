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
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Kadai Kito</span>
                </a>
            
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    @if(auth()->guard('web')->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.history') }}">
                            <i class="fas fa-history"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.detail') }}">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user-circle mr-2"></i> 
                            {{ auth()->guard('web')->user()->name }}
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
                    @elseif(auth()->guard('owner')->user())
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user-circle mr-2"></i> 
                            {{ auth()->guard('owner')->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                            <a href="{{ route('owner.index') }}" class="dropdown-item">
                                <i class="fas fa-user mr-2"></i> 
                                Owner Page
                            </a>
                            <a href="{{ route('auth.logout') }}" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i> 
                                Logout
                            </a>
                        </div>
                    </li>
                    @elseif(auth()->guard('admin')->user())
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user-circle mr-2"></i> 
                            {{ auth()->guard('admin')->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                            <a href="{{ route('admin.index') }}" class="dropdown-item">
                                <i class="fas fa-user mr-2"></i> 
                                Admin Page
                            </a>
                            <a href="{{ route('auth.logout') }}" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i> 
                                Logout
                            </a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.getLogin') }}">
                            Login
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            Register
                        </a>
                        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                            <a href="{{ route('auth.getOwnerRegister') }}" class="dropdown-item">
                                <i class="fas fa-store mr-2"></i> Seller
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('auth.getUserRegister') }}" class="dropdown-item">
                                <i class="fas fa-user mr-2"></i> Buyer
                            </a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2020 <a href="">Riset Dasar LPPM Unand</a>.</strong> All rights reserved.
        </footer>
    </div>
@endsection

@section('foot')
    @yield('js')
@endsection