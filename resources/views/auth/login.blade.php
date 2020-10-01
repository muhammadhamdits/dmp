@extends('layout.auth')

@section('content')
<div class="card-body login-card-body">
    
    <div class="row">
        <div class="col-md-6">
            
        </div>
        <div class="col-md-6">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ route('auth.getLogin') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
                </div>
            </form>
        
            <p class="mb-1 float-right">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
        </div>
    </div>

</div>
@endsection