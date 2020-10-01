<?php

namespace App\Http\Controllers;

use App\Pemilik;
use App\Type;
use App\Unit;
use App\Barang;
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
}
