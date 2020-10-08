@extends('layout.user')

@section('content')
    <div class="container">
        <!-- Popular -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Popular!</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row d-flex align-items-stretch">
                            @foreach($populars as $popular)
                            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                                <div class="card" style="width: 100%">
                                    <div class="gambar" style="background-image: url('/img/item/{{ $popular->barang->foto }}')"></div>
                                    <div class="card-footer" style="background-color: rgba(255,255,255,0)">
                                        <a href="{{ route('user.itemDetail', $popular->barang->id) }}"><b>{{ $popular->barang->nama }}</b></a>
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
        </section>

        <!-- New -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>New!</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row d-flex align-items-stretch">
                            @foreach($news as $item)
                            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                                <div class="card" style="width: 100%">
                                    <div class="gambar" style="background-image: url('/img/item/{{ $item->foto }}')"></div>
                                    <div class="card-footer" style="background-color: rgba(255,255,255,0)">
                                        <a href="{{ route('user.itemDetail', $item->id) }}"><b>{{ $item->nama }}</b></a>
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
        </section>

        <!-- Store -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Store List</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row d-flex align-items-stretch">
                            @foreach($stores as $store)
                            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                                <div class="card" style="width: 100%">
                                    <div class="gambar" style="background-image: url('/img/shop/{{ $store->pict_1 }}')"></div>
                                    <div class="card-footer" style="background-color: rgba(255,255,255,0)">
                                        <a href="{{ route('user.storeDetail', $store->id) }}"><b>{{ $store->shop_name }}</b></a>
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
        </section>
    </div>
@endsection