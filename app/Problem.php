<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use IncorrectAnswer;

class Problem extends Model
{

    public function contests()
    {
        return $this->belongsToMany(Contest::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

    public function check(string $answer,callable $solve)
    {
        if($this->answer == $answer){
            $solve($this);
        }
        throw new IncorrectAnswer;
    }
    
}
