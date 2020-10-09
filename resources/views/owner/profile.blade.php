@extends('layout.owner')

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
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="form-group">
                            <a href="{{ route('auth.editProfile') }}" class="btn btn-warning float-right">
                                <div class="fas fa-edit"></div> Edit Profile
                            </a>
                        </div>
                        <div class="form-group">
                            <label for="">Name : </label>
                            <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('owner')->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Shop Name : </label>
                            <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('owner')->user()->shop_name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Shop Address : </label>
                            <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('owner')->user()->shop_address }}">
                        </div>
                        <div class="form-group">
                            <label for="">Owner Address : </label>
                            <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('owner')->user()->owner_address }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email : </label>
                            <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('owner')->user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone : </label>
                            <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('owner')->user()->phone_number }}">
                        </div>
                        <div class="form-group">
                            <label for="">Other Info : </label>
                            <input type="text" class="form-control" disabled style="border: none; border-color: transparent; background-color: transparent" value="{{ auth()->guard('owner')->user()->other_info }}">
                        </div>
                        <div class="form-group">
                            <label for="">Picture : </label>
                            <br>
                            <img src="{{ url('/img/shop/'.auth()->guard('owner')->user()->pict_1) }}" alt="" height="250">
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