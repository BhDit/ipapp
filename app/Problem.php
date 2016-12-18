<?php

namespace App;

use App\Exceptions\Problem\IncorrectAnswer;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{

    protected $hidden = ['answer'];

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

    public function solvers()
    {
        return $this->belongsToMany(User::class,'answers');
    }

    /**
     * @param User|int $user
     * @return bool
     */
    public function isSolvedBy($user)
    {
        if($user instanceof User){
            return $this->solvers()->where('id',$user->id)->count() > 0;
        }

        return $this->solvers()->where('id',$user)->count() > 0;
    }

}
