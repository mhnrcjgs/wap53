<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shortcode extends Model
{
    //
    protected $guarded = ['id'];

    public function links()
    {
        $this->hasMany('App\Link');
    }
}
