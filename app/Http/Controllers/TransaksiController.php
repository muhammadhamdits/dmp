<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Barang;
use App\TransaksiBarang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Transaksi $transaksi)
    {
        //
    }

    public function edit(Transaksi $transaksi)
    {
        //
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function cartAdd(Request $request){
        $item = Barang::findOrFail($request->item_id);
        $transaksi = Transaksi::where('status', 0)
                    ->where('user_id', auth()->guard('web')->user()->id)
                    ->where('pemilik_id', $item->store->id)
                    ->first();
        if(!$transaksi){
            $transaksi = Transaksi::create([
                'user_id'       => auth()->guard('web')->user()->id,
                'pemilik_id'    => $item->store->id,
                'payment'       => 0,
                'status'        => 0
            ]);
        }
        if($transaksi->detail->contains('barang_id', $request->item_id)){
            $detail = TransaksiBarang::where('transaksi_id', $transaksi->id)
                            ->where('barang_id', $request->item_id)
                            ->first();
            $detail->update(['jumlah' => $detail->jumlah + $request->jumlah]);

        } else{
            TransaksiBarang::create([
                'transaksi_id'  => $transaksi->id,
                'barang_id'     => $request->item_id,
                'jumlah'        => $request->jumlah
            ]);
        }
            
        return back()->with('success','Item added to card!');;
    }

    public function cartDetail(){
        $carts = Transaksi::where('status', 0)
                    ->where('user_id', auth()->guard('web')->user()->id)
                    ->get();
        
        return view('user.cart', compact('carts'));
    }

    public function checkout(Request $request, $id){
        $cart = Transaksi::findOrFail($id);
        $cart->update([
            'payment' => $request->payment,
            'tanggal'=> date('Y-m-d H:i:s'),
            'status' => 1
        ]);
        if($request->payment == 0){
            $message = 'Your order has been sent to seller!';
        }else{
            $message = 'Your order has been sent to seller! Pay to this Rekening'.$cart->shop->rekening;
        }
        return back()->with('success', $message);
    }

    public function history(){
        $transaksis = Transaksi::where('user_id', auth()->guard('web')->user()->id)
                                ->where('status', '!=', 0)
                                ->get();
        // dd($transaksis);
        return view('user.history', compact('transaksis'));
    }

    public function detailHistory($id){
        $transaksi = Transaksi::findOrFail($id);
        return view('user.detail', compact('transaksi'));
    }
}
