<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
