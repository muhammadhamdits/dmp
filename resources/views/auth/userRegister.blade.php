@extends('layout.auth')

@section('content')
<div class="card-header text-center">
    <b>Register</b>
</div>
<div class="card-body">
    <div class="row justify-content-center">
        <div class="col-11">
            <form action="{{ route('auth.postUserRegister') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone_number" class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                        <input type="text" id="phone_number" class="form-control" name="phone_number" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" class="form-control" name="email" placeholder="E-Mail" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <textarea name="address" id="address" rows="2" class="form-control" placeholder="Address" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" id="username" class="form-control" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-3 col-form-label">Repeat password</label>
                    <div class="col-sm-9">
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Repeat Password" required>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-user-plus"></i> Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection