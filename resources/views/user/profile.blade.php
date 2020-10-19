@extends('layout.user')

@section('head')
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <style>
    </style>
@endsection

@section('content')
    <div class="container">
        <section class="content-header">
        </section>
        <section class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card card-solid">
                            <div class="card-body">
                                @include('flash-message')
                                <div class="form-group ml-4">
                                    <a href="{{ route('auth.editProfile') }}" class="btn btn-warning float-right">
                                        <div class="fas fa-edit"></div> Edit Profile
                                    </a>
                                </div>
                                <div class="form-group ml-4">
                                    <label for="">Name : </label>
                                    <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('web')->user()->name }}">
                                </div>
                                <div class="form-group ml-4">
                                    <label for="">Email : </label>
                                    <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('web')->user()->email }}">
                                </div>
                                <div class="form-group ml-4">
                                    <label for="">Phone Number : </label>
                                    <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('web')->user()->phone_number }}">
                                </div>
                                <div class="form-group ml-4">
                                    <label for="">Address : </label>
                                    <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('web')->user()->address }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
    });

</script>
@endsection