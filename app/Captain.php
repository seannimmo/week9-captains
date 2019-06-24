<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    public function image()
    {
        return $this->belongsToMany('App\Image');
    }
}
