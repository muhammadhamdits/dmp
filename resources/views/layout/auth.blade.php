@extends('layout.app')

@section('head')
<style>
    .gambar{
        /* width: 100%; */
        /* height: 100%; */
        padding-top: 100%;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>
@endsection

@section('body')
<body class="hold-transition lockscreen">
    <div class="row justify-content-center mt-5">
        <div class="col-10 col-sm-8 col-md-6">
            <div class="register-logo">
                <a href="{{ url('/') }}"><b class="text-primary">Kadai Kito</b></a>
            </div>
    
            <div class="card">
                @yield('content')
            </div>
        </div>
    </div>
@endsection

@section('foot')
    @yield('script')
@endsection