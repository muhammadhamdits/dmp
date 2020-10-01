<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiBarang extends Model
{
    protected $guarded = [];
    
    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi');
    }

    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
}
