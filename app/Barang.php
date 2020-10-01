<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function unit(){
        return $this->belongsTo('App\Unit');
    }

    public function store()
    {
        return $this->belongsTo('App\Pemilik', 'pemilik_id');
    }
}
