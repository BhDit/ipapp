<?php

namespace App;

use App\Exceptions\Problem\IncorrectAnswer;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{

    /**
     * @var array
     */
    protected $hidden = ['answer'];

    protected $fillable = [
        'title',
        'score',
        'answer',
        'description',
        'level',
    ];
    /**
     * @var array
     */
    protected $appends = ['solvedBy','userSolved'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contests()
    {
        return $this->belongsToMany(Contest::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

    /**
     * @param string $answer
     * @return bool
     */
    public function check(string $answer)
    {
        return ($this->answer == $answer) ? true : false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
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

    /**
     * @return mixed
     */
    public function getSolvedByAttribute()
    {
        return $this->solvers()->count();
    }

    /**
     * @return bool
     */
    public function getUserSolvedAttribute()
    {
        if(auth()->check()){
            return !! $this->isSolvedBy(request()->user());
        }

        return false;
    }

}
