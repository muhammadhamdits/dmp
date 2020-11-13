<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        .tr td{
            border-bottom: 1px solid black !important;
            border-top: 1px solid black !important;
            border-collapse: collapse !important;
        }
    </style>
</head>
<body>
    <h1>Invoice</h1>
    <hr>

    <table width="100%">
        <tr>
            <td width="10%">No</td>
            <td width="55%">: {{ $transaksi->id }}</td>
            <td width="1%"></td>
            <td width="10%"></td>
            <td width="27%"></td>
        </tr>
        <tr>
            <td width="10%">Date</td>
            <td width="55%">: {{ $transaksi->tanggal }}</td>
            <td width="1%"></td>
            <td width="10%">Method</td>
            <td width="27%">: {{ $transaksi->payment == 0 ? 'Cash on Delivery' : 'Transfer' }}</td>
        </tr>
        <tr>
            <td width="10%">Seller</td>
            <td width="55%">: {{ $transaksi->shop->shop_name }}</td>
            <td width="1%"></td>
            <td width="10%">Buyer</td>
            <td width="27%">: {{ $transaksi->user->name }}</td>
        </tr>
        <tr>
            <td width="10%">Seller address</td>
            <td width="55%">: {{ $transaksi->shop->shop_address }}</td>
            <td width="1%"></td>
            <td width="10%">Buyer Address</td>
            <td width="27%">: {{ $transaksi->user->address }}</td>
        </tr>
    </table>

    <h3>Transaction Detail</h2>
    <table width="100%">
        <tr class="tr">
            <th width="60%">Item</th>
            <th width="10%">Qty</th>
            <th width="15">Price</th>
            <th width="15%">Total</th>
        </tr>
        <?php $sum = 0; ?>
        @foreach($transaksi->detail as $detail)
        <tr class="tr">
            <td width="60%">{{ $detail->barang->nama }}</th>
            <td width="10%">{{ $detail->jumlah }}</th>
            <td width="15">{{ $detail->barang->harga }}</th>
            <td width="15%">{{ $detail->barang->harga * $detail->jumlah }}</th>
        </tr>
        <?php $sum += $detail->barang->harga * $detail->jumlah; ?>
        @endforeach
        <tr>
            <th colspan="3">Summary</th>
            <th>{{ $sum }}</th>
        </tr>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>