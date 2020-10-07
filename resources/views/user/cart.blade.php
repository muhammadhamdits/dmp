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
                @include('flash-message')
                @foreach($carts as $cart)
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <h4>{{ $cart->shop->shop_name }}</h4>
                        <table width="100%" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pict</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->detail as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="/img/item/{{ $detail->barang->foto }}" alt="" width="75" height="75"></td>
                                    <td>{{ $detail->barang->nama }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                    <td class="text-right">{{ $detail->barang->harga }}</td>
                                    <td class="text-right">{{ $detail->jumlah * $detail->barang->harga }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                <tr>
                                    <th colspan="5" class="text-right">Summary</th>
                                    <th class="text-right"></th>
                                </tr>
                                <tr>
                                    <form action="{{ route('cart.checkout', $cart->id) }}" method="post">
                                        @csrf
                                        <td class="text-right" colspan="6">
                                            <button type="submit" class="btn btn-primary">Checkout</button>
                                        </td>  
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection