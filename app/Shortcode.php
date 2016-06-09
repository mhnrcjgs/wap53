<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shortcode extends Model
{
    //
    protected $guarded = ['id'];

    public function links()
    {
        return $this->hasMany('App\Link');
    }
}
