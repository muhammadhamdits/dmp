<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\TransaksiBarang;
use App\Pemilik;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        // if(auth()->guard('admin')->check()){
        //     return view('admin.index');
        // }elseif(auth()->guard('owner')->check()){
        //     return view('owner.index');
        // }else{
            $stores     = Pemilik::where('status', 1)->get();
            $populars   = TransaksiBarang::select(DB::raw("barang_id, COUNT('barang_id') AS hitung"))
                            ->groupBy('barang_id')
                            ->orderBy('hitung', 'DESC')
                            ->take(4)
                            ->get();
            $news       = Barang::orderBy('created_at', 'ASC')
                            ->take(4)
                            ->get();
            return view('user.index', compact('stores', 'populars', 'news'));
        // }
    }

    public function storeDetail($id){
        $store = Pemilik::findOrFail($id);
        return view('user.storeDetail', compact('store'));
    }

    public function itemDetail($id){
        $item = Barang::findOrFail($id);
        // dd($item);
        return view('user.itemDetail', compact('item'));
    }
}
