@extends('layout.user')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>History</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                @include('flash-message')
                <div class="card card-solid">
                    <div class="card-body pb-0 mb-3">
                        <table width="100%" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Shop Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->id }}</td>
                                    <td>{{ $transaksi->shop->shop_name }}</td>
                                    <td>{{ $transaksi->tanggal }}</td>
                                    <td>
                                        @if($transaksi->status == 1)
                                            Process
                                        @elseif($transaksi->status == 2)
                                            Done
                                        @else
                                            Rejected
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('cart.detailHistory', $transaksi->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                        <a href="{{ route('cart.facture', $transaksi->id) }}" target="_blank" class="btn btn-sm btn-warning">Invoice</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
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