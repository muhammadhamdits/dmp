@extends('layout.admin')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Store Detail</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4">
                                <div class="gambar" style="background-image: url('/img/shop/{{ $store->pict_1 }}')">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Owner Name:</label>
                                    <p>{{ $store->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <p>{{ $store->phone_number }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Owner Address:</label>
                                    <p>{{ $store->owner_address }}</p>
                                </div>
                                <div class="form-group">
                                    <label>E-Mail:</label>
                                    <p>{{ $store->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Other Information:</label>
                                    <p>{{ $store->other_info }}</p>
                                </div>
                                @if($store->status == 0)
                                <div class="form-group">
                                    <form action="{{ route('admin.confirmStore', [$store->id]) }}" method="post" style="display: inline-block">
                                        @csrf
                                        <input type="hidden" name="status" value="2">
                                        <button onclick="return confirm('Are you sure refuse this store?')" type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Refuse</button>
                                    </form>
                                    <form action="{{ route('admin.confirmStore', [$store->id]) }}" method="post" style="display: inline-block">
                                        @csrf
                                        <input type="hidden" name="status" value="1">
                                        <button onclick="return confirm('Are you sure accept this store?')" type="submit" class="btn btn-success ml-2"><i class="fas fa-check"></i> Accept</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection