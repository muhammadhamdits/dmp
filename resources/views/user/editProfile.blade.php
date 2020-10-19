@extends('layout.user')

@section('head')
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <style>
    </style>
@endsection

@section('content')
    <div class="container">
        <section class="content-header">
            @include('flash-message')
        </section>
        <section class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card card-solid">
                            <div class="card-body">
                                <form action="{{ route('auth.updateProfile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name : </label>
                                        <input name="name" type="text" class="form-control" value="{{ auth()->guard('web')->user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email : </label>
                                        <input name="email" type="email" class="form-control" value="{{ auth()->guard('web')->user()->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone Number : </label>
                                        <input name="phone_number" type="text" class="form-control" value="{{ auth()->guard('web')->user()->phone_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address : </label>
                                        <input name="address" type="text" class="form-control" value="{{ auth()->guard('web')->user()->address }}">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary float-right" type="submit">Update</button>
                                    </div>
                                </form>
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