<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //
    public function problem()
    {
        return $this->belongsTo('App\Contest');
    }
}
