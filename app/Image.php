<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
