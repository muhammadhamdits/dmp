@extends('layout.owner')

@section('head')
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
    <div class="container">
        <section class="content-header">
            @include('flash-message')
        </section>
        <section class="content">
            <div class="container">
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="form-group">
                            <form action="{{ route('owner.orderProcess', $order->id )}}" method="post">
                                @csrf
                                <button type="submit" name="proses" class="float-right btn btn-primary" onclick="return confirm('Are you sure?')">Process</button>
                                <button type="submit" name="refuse" class="float-right btn btn-danger mr-2" onclick="return confirm('Are you sure?')">Refuse</button>
                            </form>
                        </div>
                        <div class="form-group">
                            <label for="">Customer Name : </label>
                            {{$order->user->name}}
                        </div>
                        <div class="form-group">
                            <label for="">Address : </label>
                            {{$order->user->address}}
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number : </label>
                            {{$order->user->phone_number}}
                        </div>
                        <table class="table" id="tabelItem">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->detail as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->barang->nama }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                    <td>{{ $detail->barang->unit->name }}</td>
                                    <td>{{ $detail->barang->harga * $detail->jumlah }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#tabelItem").DataTable();
    });

</script>
@endsection