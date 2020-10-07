<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function detail()
    {
        return $this->hasMany('App\TransaksiBarang', 'transaksi_id');
    }

    public function shop()
    {
        return $this->belongsTo('App\Pemilik', 'pemilik_id');
    }
}
