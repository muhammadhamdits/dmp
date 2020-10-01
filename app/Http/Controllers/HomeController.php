<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pemilik;

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
            $stores = Pemilik::where('status', 1)->get();
            return view('user.index', compact('stores'));
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
