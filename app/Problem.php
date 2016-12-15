<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //
    public function contests()
    {
        return $this->belongsToMany(Contest::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }


    
}
