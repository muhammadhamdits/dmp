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
                        <form action="{{ route('auth.updateProfile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Name : </label>
                                <input name="name" type="text" class="form-control" value="{{ auth()->guard('owner')->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Shop Name : </label>
                                <input name="shop_name" type="text" class="form-control" value="{{ auth()->guard('owner')->user()->shop_name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Shop Address : </label>
                                <input name="shop_address" type="text" class="form-control" value="{{ auth()->guard('owner')->user()->shop_address }}">
                            </div>
                            <div class="form-group">
                                <label for="">Owner Address : </label>
                                <input name="owner_address" type="text" class="form-control" value="{{ auth()->guard('owner')->user()->owner_address }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email : </label>
                                <input name="email" type="text" class="form-control" value="{{ auth()->guard('owner')->user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Phone : </label>
                                <input name="phone_number" type="text" class="form-control" value="{{ auth()->guard('owner')->user()->phone_number }}">
                            </div>
                            <div class="form-group">
                                <label for="">Other Info : </label>
                                <input name="other_info" type="text" class="form-control" value="{{ auth()->guard('owner')->user()->other_info }}">
                            </div>
                            <div class="form-group">
                                <label for="">Picture : </label>
                                <input type="file" name="pict_1" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary float-right" type="submit">Update</button>
                            </div>
                        </form>
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