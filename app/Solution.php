<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $table = 'solutions';

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
