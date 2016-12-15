<?php

namespace App;

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

    public function solved()
    {
        return $this->belongsToMany(Problem::class, 'answers');
    }

    public function solve(Problem $problem, string $answer): bool
    {
        if ($problem->answer != $answer) {
            return false;
        }
        $this->solved()->attach($problem);
        return true;
    }
}
