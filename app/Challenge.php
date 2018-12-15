<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

class Challenge extends Model
{

    protected $guarded = [];
    protected $atttributes = ['status'];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('failed_at','days_completed','completed');
    }

    public function duration()
    {
        $starts_at = Carbon::parse($this->starts_at);
        $ends_at = Carbon::parse($this->ends_at);
        return $ends_at->diffInDays($starts_at);
    }

    public function daysSinceStart()
    {
        $starts_at = Carbon::parse($this->starts_at);

        return $starts_at->diffInDays(Carbon::now(),false);
    }

    public function updateChallenge($challenge)
    {
        $starts_at = Carbon::parse($this->starts_at);
        $ends_at = Carbon::parse($this->ends_at);
        $daysToComplete = $starts_at->diffInDays($ends_at,false)+1;

        $user = ($challenge->users()
                     ->where('id',Auth::user()->id)->first());
        $user->pivot->days_completed += 1;

        if ($user->pivot->days_completed == $daysToComplete) {
            $user->pivot->completed = 1;
        }
        $user->pivot->save();
    }

    public function ActiveForSignedInUser()
    {
        if(!Auth::check())
            return false;

        $usersForChallenge = $this->users()->get();
        foreach($usersForChallenge as $user) {
            if($user->id == Auth::user()->id){
                return true;
            }
            return false;
        }
    }
}
