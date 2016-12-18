<?php

namespace App;

use App\Events\ProblemSolved;
use App\Exceptions\Problem\IncorrectAnswer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Problems that the user solved
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function solved()
    {
        return $this->belongsToMany(Problem::class, 'answers');
    }

    /**
     * @return mixed
     */
    public function solvedProblems()
    {
        return $this->solved->pluck('id')->toArray();
    }

    /**
     * @param Problem|int $problem
     * @return bool
     */
    public function hasSolvedProblem($problem)
    {
        if($problem instanceof Problem){
            $problem = $problem->id;
        }
        return in_array($problem,$this->solvedProblems->pluck('id')->toArray());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

    public function postedSolutionTo(int $problemId)
    {
        return $this->solutions()->where('problem_id',$problemId)->count() > 0;
    }

    /**
     * @param Problem $problem
     * @param string $answer
     * @return bool
     * @throws IncorrectAnswer
     */
    public function solve(Problem $problem, string $answer): bool
    {
        if($problem->check($answer)){
            $this->solved()->attach($problem);
            event(new ProblemSolved($this,$problem));
            return true;
        }
        throw new IncorrectAnswer();
    }

}
