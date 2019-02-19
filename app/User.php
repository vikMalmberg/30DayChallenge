<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HandlesChallenges;

class User extends Authenticatable
{
    use Notifiable;
    use HandlesChallenges;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public $remember_token = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class)->withPivot('failed_at','completed');
    }

}
