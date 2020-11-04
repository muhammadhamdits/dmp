@extends('layout.auth')

@section('content')
<div class="card-header text-center bg-primary">
    <b>Register as Shop Owner</b>
</div>
<div class="card-body">
    <div class="row justify-content-center">
        <div class="col-11">
            @include('flash-message')
            <form action="{{ route('auth.postOwnerRegister') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="part-1">
                    <div class="form-group row">
                        <label for="shop_name" class="col-sm-3 col-form-label">Shop Name*</label>
                        <div class="col-sm-9">
                            <input type="text" id="shop_name" class="form-control @error('shop_name')is-invalid @enderror" name="shop_name" placeholder="Shop Name" value="{{ old('shop_name') }}">
                            @error('shop_name')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="shop_address" class="col-sm-3 col-form-label">Shop Address*</label>
                        <div class="col-sm-9">
                            <textarea name="shop_address" id="shop_address" rows="2" class="form-control @error('shop_address') is-invalid @enderror" placeholder="Shop Address" value="{{ old('shop_address') }}"></textarea>
                            @error('shop_address')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Owner Name*</label>
                        <div class="col-sm-9">
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Owner Name" value="{{ old('name') }}">
                            @error('name')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-3 col-form-label">Phone Number*</label>
                        <div class="col-sm-9">
                            <input type="text" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="owner_address" class="col-sm-3 col-form-label">Owner Address*</label>
                        <div class="col-sm-9">
                            <textarea name="owner_address" id="owner_address" rows="2" class="form-control @error('owner_address') is-invalid @enderror" placeholder="Owner Address" value="{{ old('owner_address') }}"></textarea>
                            @error('owner_address')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email*</label>
                        <div class="col-sm-9">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rekening" class="col-sm-3 col-form-label">No. Rekening</label>
                        <div class="col-sm-9">
                            <input type="text" id="rekening" class="form-control @error('rekening') is-invalid @enderror" name="rekening" placeholder="BNI 11100022299 a.n Udin Ujang" value="{{ old('rekening') }}">
                            @error('rekening')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="other_info" class="col-sm-3 col-form-label">Other Information*</label>
                        <div class="col-sm-9">
                            <input type="text" id="other_info" class="form-control @error('other_info') is-invalid @enderror" name="other_info" placeholder="Other Information" value="{{ old('other_info') }}">
                            @error('other_info')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pict_1" class="col-sm-3 col-form-label">Picture*</label>
                        <div class="col-sm-9">
                            <input type="file" id="pict_1" class="form-control @error('pict_1') is-invalid @enderror" name="pict_1" value="{{ old('pict_1') }}">
                            @error('pict_1')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ktp" class="col-sm-3 col-form-label">KTP*</label>
                        <div class="col-sm-9">
                            <input type="file" id="ktp" class="form-control @error('ktp') is-invalid @enderror" name="ktp" value="{{ old('ktp') }}">
                            @error('ktp')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
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
                        <label for="username" class="col-sm-3 col-form-label">Username*</label>
                        <div class="col-sm-9">
                            <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password*</label>
                        <div class="col-sm-9">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" >
                            @error('password')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-sm-3 col-form-label">Repeat password*</label>
                        <div class="col-sm-9">
                            <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Repeat Password" >
                            @error('password_confirmation')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
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