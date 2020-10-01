<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pemilik extends Authenticatable
{
    use Notifiable;

    protected $guard = "admin";

    protected $guarded = [];

    protected $hidden = ['password'];

    public function items()
    {
        return $this->hasMany('App\Barang');
    }
}
