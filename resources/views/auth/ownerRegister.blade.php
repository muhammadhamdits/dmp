@extends('layout.auth')

@section('content')
<div class="card-header text-center">
    <b>Register</b>
</div>
<div class="card-body">
    <div class="row justify-content-center">
        <div class="col-11">
            <form action="{{ route('auth.postOwnerRegister') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="part-1">
                    <div class="form-group row">
                        <label for="shop_name" class="col-sm-3 col-form-label">Shop Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="shop_name" class="form-control" name="shop_name" placeholder="Shop Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="shop_address" class="col-sm-3 col-form-label">Shop Address</label>
                        <div class="col-sm-9">
                            <textarea name="shop_address" id="shop_address" rows="2" class="form-control" placeholder="Shop Address" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Owner Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="name" class="form-control" name="name" placeholder="Owner Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                            <input type="text" id="phone_number" class="form-control" name="phone_number" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="owner_address" class="col-sm-3 col-form-label">Owner Address</label>
                        <div class="col-sm-9">
                            <textarea name="owner_address" id="owner_address" rows="2" class="form-control" placeholder="Owner Address" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="other_info" class="col-sm-3 col-form-label">Other Information</label>
                        <div class="col-sm-9">
                            <input type="text" id="other_info" class="form-control" name="other_info" placeholder="Other Information">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pict_1" class="col-sm-3 col-form-label">Picture</label>
                        <div class="col-sm-9">
                            <input type="file" id="pict_1" class="form-control" name="pict_1">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary btn-block" id="next"><b>>></b> Next</button>
                        </div>
                    </div>
                </div>

                <div class="part-2" style="display: none">
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
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $("#next").on('click', function(){
        $(".part-1").hide();
        $(".part-2").show();
    })
</script>
@endsection