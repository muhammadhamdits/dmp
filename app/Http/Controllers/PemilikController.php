<?php

namespace App\Http\Controllers;

use App\Pemilik;
use App\Type;
use App\Unit;
use App\Barang;
use App\Transaksi;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function __construct(){
        $this->middleware('auth:owner');
    }

    public function index()
    {
        $types = Type::all();
        $units = Unit::all();
        $items = Barang::where('pemilik_id', auth()->guard('owner')->user()->id)->get();
        return view('owner.index', compact('types', 'units', 'items'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Pemilik $pemilik)
    {
        //
    }

    public function edit(Pemilik $pemilik)
    {
        //
    }

    public function update(Request $request, Pemilik $pemilik)
    {
        //
    }

    public function destroy(Pemilik $pemilik)
    {
        //
    }

    public function itemDetail($id){
        $item = Barang::findOrFail($id);
        return view('owner.itemDetail', compact('item'));
    }

    public function orders(){
        $unprocess  = Transaksi::where('pemilik_id', auth()->guard('owner')->user()->id)
                    ->where('status', 1)
                    ->get();
        $process    = Transaksi::where('pemilik_id', auth()->guard('owner')->user()->id)
                    ->where('status', 2)
                    ->get();
        $orders     = $unprocess->merge($process);
        return view('owner.orders', compact('orders'));
    }

    public function order($id){
        $order = Transaksi::findOrFail($id);
        return view('owner.order', compact('order'));
    }

    public function orderProcess(Request $request, $id){
        $order = Transaksi::findOrFail($id);
        // dd($request->all());
        if(isset($request->proses)){
            $order->update([
                'status' => 2
            ]);
            return back()->with('success','Order are going to be processed!');
        }elseif(isset($request->done)){
            $order->update([
                'status' => 3
                ]);
            return back()->with('success','Order Done!');
        }elseif(isset($request->refuse)){
            $order->update([
                'status' => 4
                ]);
            return back()->with('danger','Order Refused!');
        }
    }

    public function history(){
        $refused    = Transaksi::where('pemilik_id', auth()->guard('owner')->user()->id)
                    ->where('status', 4)
                    ->get();
        $done       = Transaksi::where('pemilik_id', auth()->guard('owner')->user()->id)
                    ->where('status', 3)
                    ->get();
        $data       = $refused->merge($done);
        return view('owner.history', compact('data'));
    }
}
