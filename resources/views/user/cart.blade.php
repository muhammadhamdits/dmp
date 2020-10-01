@extends('layout.user')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-7">
                                @foreach($cart->detail as $detail)
                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-stretch">
                                            <div class="card" style="width: 100%">
                                                <div class="gambar" style="background-image: url('/img/item/{{ $detail->barang->foto }}')"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">{{ $detail->barang->nama }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">{{ $detail->barang->harga }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" value="{{   $detail->jumlah }}">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="">{{ $detail->barang->unit->name }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Estimate Total</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                </div>
                                <form action="{{ route('cart.checkout') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Checkout</button>
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