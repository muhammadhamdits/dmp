@extends('layout.user')

@section('css')
    <style>
@media (max-width: 768px) {
    .carousel-inner .carousel-item > div {
        display: none;
    }
    .carousel-inner .carousel-item > div:first-child {
        display: block;
    }
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
    display: flex;
}

/* display 3 */
@media (min-width: 768px) {
    
    .carousel-inner .carousel-item-right.active,
    .carousel-inner .carousel-item-next {
      transform: translateX(33.333%);
    }
    
    .carousel-inner .carousel-item-left.active, 
    .carousel-inner .carousel-item-prev {
      transform: translateX(-33.333%);
    }
}

.carousel-inner .carousel-item-right,
.carousel-inner .carousel-item-left{ 
  transform: translateX(0);
}


    </style>
@endsection

@section('content')
    <div class="container">
        @if($populars->count() > 0)
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
                        <div class="row mx-auto my-auto">
                            <div id="popCar" class="carousel slide w-100" data-ride="carousel">
                                <div class="carousel-inner w-100" role="listbox">
                                    @foreach($populars as $store)
                                    <div class="carousel-item @if($loop->iteration == 1) active @endif">
                                        <div class="col-md-2 ml-4">
                                            <div class="card" style="width: 100%">
                                                <div class="gambar" style="background-image: url('/img/item/{{ $store->barang->foto }}')"></div>
                                                <div class="card-footer" style="background-color: rgba(255,255,255,0)">
                                                    <a href="{{ route('user.itemDetail', $store->barang->id) }}"><b>{{ $store->barang->nama }}</b></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev w-auto" href="#popCar" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next w-auto" href="#popCar" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if($news->count() > 0)
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
                        <div class="row mx-auto my-auto">
                            <div id="newCar" class="carousel slide w-100" data-ride="carousel">
                                <div class="carousel-inner w-100" role="listbox">
                                    @foreach($news as $store)
                                    <div class="carousel-item @if($loop->iteration == 1) active @endif">
                                        <div class="col-md-2 ml-4">
                                            <div class="card" style="width: 100%">
                                                <div class="gambar" style="background-image: url('/img/item/{{ $store->foto }}')"></div>
                                                <div class="card-footer" style="background-color: rgba(255,255,255,0)">
                                                    <a href="{{ route('user.itemDetail', $store->id) }}"><b>{{ $store->nama }}</b></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev w-auto" href="#newCar" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next w-auto" href="#newCar" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

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
                        <div class="row mx-auto my-auto">
                            <div id="stoCar" class="carousel slide w-100" data-ride="carousel">
                                <div class="carousel-inner w-100" role="listbox">
                                    @foreach($stores as $store)
                                    <div class="carousel-item @if($loop->iteration == 1) active @endif">
                                        <div class="col-md-2 ml-4">
                                            <div class="card" style="width: 100%">
                                                <div class="gambar" style="background-image: url('/img/shop/{{ $store->pict_1 }}')"></div>
                                                <div class="card-footer" style="background-color: rgba(255,255,255,0)">
                                                    <a href="{{ route('user.storeDetail', $store->id) }}"><b>{{ $store->shop_name }}</b></a>
                                                    <br>
                                                    {{ $store->shop_address }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev w-auto" href="#stoCar" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next w-auto" href="#stoCar" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
<script>
    $('#popCar').carousel({
        interval: 10000
    });

    $('#newCar').carousel({
        interval: 10000
    });

    $('#stoCar').carousel({
        interval: 10000
    });

    $('.carousel .carousel-item').each(function(){
        var minPerSlide = 3;
        var next = $(this).next();
        if (!next.length) {
        next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
        
        for (var i=0;i<minPerSlide;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            
            next.children(':first-child').clone().appendTo($(this));
        }
    });
</script>
@endsection