@extends('layout.user')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="card" style="width: 100%">
                            <div class="gambar" style="background-image: url('/img/shop/{{ $store->pict_1 }}')"></div>
                        </div>
                        <h4><b>{{ $store->shop_name }}</b></h4>
                        <h5>{{ $store->shop_address }}</h5>
                        <h6>{{ $store->other_info }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-solid mt-4">
                    <div class="card-body pb-0">
                        <div class="row d-flex align-items-stretch">
                            @foreach($store->items as $item)
                            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                                <div class="card" style="width: 100%">
                                    <div class="gambar" style="background-image: url('/img/item/{{ $item->foto }}')"></div>
                                    <div class="card-footer" style="background-color: rgba(255,255,255,0)">
                                        <a href="{{ route('user.itemDetail', $item->id) }}">{{ $item->nama }}</a>
                                        <br>
                                        <b>Rp {{ $item->harga }} (per {{ $item->unit->name }})</b>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="card-footer">
                        <nav aria-label="Store List Page Navigation">
                            <ul class="pagination justify-content-center m-0">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection