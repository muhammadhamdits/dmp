<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
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
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = 'img/item';
		$file->move($tujuan_upload,$nama_file);

        Barang::create([
            'nama'          => $request->name,
            'harga'         => $request->price,
            'stok'          => $request->stock,
            'pemilik_id'    => auth()->guard('owner')->user()->id,
            'unit_id'       => $request->unit_id,
            'type_id'       => $request->type_id,
            'foto'          => $nama_file
        ]);
        return redirect(route('owner.index'))->with('success','Item Added successfully!');;
    }

    public function show(Barang $barang)
    {
        //
    }

    public function edit(Barang $barang)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if($request->file('foto') != null){
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'img/item';
            $file->move($tujuan_upload,$nama_file);
            unlink(public_path($tujuan_upload.'/'.Barang::findOrFail($id)->foto));
        }else{
            $nama_file = Barang::findOrFail($id)->foto;
        }
        Barang::findOrFail($id)->update([
            'nama'          => $request->name,
            'harga'         => $request->price,
            'stok'          => $request->stock,
            'unit_id'       => $request->unit_id,
            'type_id'       => $request->type_id,
            'foto'          => $nama_file
        ]);
        return redirect(route('owner.index'));
    }

    public function destroy($id)
    {
        $tujuan_upload = 'img/item';
        unlink(public_path($tujuan_upload.'/'.Barang::findOrFail($id)->foto));
        Barang::findOrFail($id)->delete();
        return redirect(route('owner.index'));
    }
}
