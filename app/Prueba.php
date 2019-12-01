<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $fillable = ['fullname', 'avatar'];

    public function getRouteKeyName() {
        return 'username';
    }
}
