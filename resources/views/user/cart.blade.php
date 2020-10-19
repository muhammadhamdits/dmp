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
                                <?php $sum=0; ?>
                                @foreach($cart->detail as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="/img/item/{{ $detail->barang->foto }}" alt="" width="75" height="75"></td>
                                    <td>{{ $detail->barang->nama }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                    <td class="text-right">{{ $detail->barang->harga }}</td>
                                    <td class="text-right">{{ $detail->jumlah * $detail->barang->harga }}</td>
                                </tr>
                                <?php $sum += $detail->jumlah * $detail->barang->harga; ?>
                                @endforeach
                            </tbody>
                            <tbody>
                                <form action="{{ route('cart.checkout', $cart->id) }}" method="post">
                                    @csrf
                                    <tr>
                                        <th colspan="5" class="text-right">Summary</th>
                                        <th class="text-right">{{ $sum }}</th>
                                    </tr>
                                    <tr>
                                        @if($cart->shop->rekening)
                                            <th colspan="6" class="text-right">
                                                Payment Method : 
                                                <input class="ml-4" type="radio" name="payment" value="0" id="cod"> <label for="cod">Cash On Delivery</label>
                                                <input class="ml-2" type="radio" name="payment" value="1" id="tf"> <label for="tf">Transfer Bank</label>
                                            </th>
                                        @else
                                            <th colspan="6" class="text-right">
                                                Payment Method : 
                                                <input class="ml-4" type="radio" name="payment" value="0" id="cod"> <label for="cod">Cash On Delivery</label>
                                                <input disabled class="ml-2" type="radio" name="payment" value="1" id="tf"> <label for="tf">Transfer Bank</label>
                                            </th>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="6">
                                            <button type="submit" class="btn btn-primary" disabled id="checkout">Checkout</button>
                                        </td>  
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $(document).on('click', '[name="payment"]', function(event) {
                $("#checkout").prop('disabled', false);
            });
        })
    </script>
@endsection