<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    public function shortcode()
    {
        $this->belongsTo('App\Shortcode');
    }
}
