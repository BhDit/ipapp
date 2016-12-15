<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    public function problems()
    {
        return $this->belongsToMany(Problem::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class);
    }
}
