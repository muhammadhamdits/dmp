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
                'status'        => 0
            ]);
        }
        TransaksiBarang::create([
            'transaksi_id'  => $transaksi->id,
            'barang_id'     => $request->item_id,
            'jumlah'        => $request->jumlah
        ]);
        return back()->with('success','Item added to card!');;
    }

    public function cartDetail(){
        $cart = Transaksi::where('status', 0)
                    ->where('user_id', auth()->guard('web')->user()->id)
                    ->first();
        
        return view('user.cart', compact('cart'));
    }

    public function checkout(){
        $cart = Transaksi::where('status', 0)
                    ->where('user_id', auth()->guard('web')->user()->id)
                    ->first();
        // $cart->update([
        //     'status' => 
        // ]);
    }
}
