<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Pemilik;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $stores = Pemilik::where('status', 0)->get();
        return view('admin.index', compact('stores'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Admin $admin)
    {
        //
    }

    public function edit(Admin $admin)
    {
        //
    }

    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy(Admin $admin)
    {
        //
    }

    public function storeDetail($id){
        $store = Pemilik::findOrFail($id);
        return view('admin.storeDetail', compact('store'));
    }

    public function confirmStore(Request $request, $id){
        $store  = Pemilik::findOrFail($id);
        $status = $request->status;
        $store->update(['status' => $status]);
        return redirect(route('admin.index'))->with('success', 'Store confimed!');
    }

    public function accepted(){
        $stores = Pemilik::where('status', 1)->get();
        return view('admin.index', compact('stores'));
    }

    public function rejected(){
        $stores = Pemilik::where('status', 2)->get();
        return view('admin.index', compact('stores'));
    }
}
