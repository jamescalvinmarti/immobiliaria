<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function property()
    {
        return $this->hasMany('App\Property');
    }
}
