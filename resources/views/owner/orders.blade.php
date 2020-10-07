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
                        <table class="table" id="tabelItem">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td><a href="{{ route('owner.order', $order->id) }}">{{ $order->id }}</a></td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->tanggal }}</td>
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