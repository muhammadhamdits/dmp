@extends('layout.admin')

@section('head')
<style>
    .gambar{
        width: 100%;
        /* height: 100px; */
        padding-top: 100%;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endsection

@section('content')
    <div class="container">
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
                                        <a href="{{ route('admin.storeDetail', $store->id) }}"><b>{{ $store->name }}</b></a>
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