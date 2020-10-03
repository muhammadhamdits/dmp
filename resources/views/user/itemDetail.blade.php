@extends('layout.user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="card" style="width: 100%">
                            <div class="gambar" style="background-image: url('/img/shop/{{ $item->store->pict_1 }}')"></div>
                        </div>
                        {{ $item->store->name }}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-solid mt-4">
                    <div class="card-body pb-0">
                        @include('flash-message')   
                        <div class="row d-flex align-items-stretch">
                            <div class="col-md-3 d-flex align-items-stretch">
                                <div class="card" style="width: 100%">
                                    <div class="gambar" style="background-image: url('/img/item/{{ $item->foto }}')"></div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    <div class="form-group">
                                        <h3>{{ $item->nama }}</h3>
                                    </div>
                                    <div class="form-group">
                                        <h4>Rp {{ $item->harga }}</h4>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="jumlah" value="1">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" value="{{ $item->unit->name }}" style="border: none; border-color: transparent;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection