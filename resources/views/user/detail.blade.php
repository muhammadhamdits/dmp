@extends('layout.user')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Transaction Detail ID {{ $transaksi->id }}</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                @include('flash-message')
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <table width="100%" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sum = 0; ?>
                                @foreach($transaksi->detail as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->barang->nama }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                    <td class="text-right">{{ $detail->barang->harga }}</td>
                                    <td class="text-right">{{ $detail->barang->harga * $detail->jumlah }}</td>
                                </tr>
                                <?php $sum += $detail->barang->harga * $detail->jumlah; ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-right">Summary</th>
                                    <th class="text-right">{{ $sum }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
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