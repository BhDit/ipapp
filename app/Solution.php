<?php

namespace App;

use App\Ipapp\Traits\LikeToggle;
use Carbon\Carbon;
use Conner\Likeable\LikeableTrait as Likeable;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use Likeable,LikeToggle;

    protected $table = 'solutions';

    protected $with = ['owner','likes'];

    protected $fillable = ['body','user_id'];

    protected $appends = ['liked','likeCount'];

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
