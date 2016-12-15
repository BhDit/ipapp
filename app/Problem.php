<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //
    public function problems()
    {
        return $this->belongsToMany('App\Contest');
    }
}
