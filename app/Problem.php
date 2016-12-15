<?php

namespace App;

use App\Exceptions\Problem\IncorrectAnswer;
use Illuminate\Database\Eloquent\Model;

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

    public function check(string $answer)
    {
        return ($this->answer == $answer) ? true : false;
    }

}
