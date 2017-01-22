<?php

namespace App;

use Carbon\Carbon;
use Conner\Likeable\LikeableTrait as Likeable;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use Likeable;

    protected $table = 'solutions';

    protected $with = ['owner'];

    protected $fillable = ['body','user_id'];

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id','id','users');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->diffForHumans();
    }
}
