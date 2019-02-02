<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Traits\HandlesContributions;
use Carbon\Carbon;
use Date;
use Auth;

class Challenge extends Model
{
    use HandlesContributions;

    protected $guarded = [];
    protected $atttributes = ['status'];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('failed_at','completed');
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

    public function CheckIn()
    {
        $starts_at = Carbon::parse($this->starts_at);
        $ends_at = Carbon::parse($this->ends_at);
        $daysToComplete = $starts_at->diffInDays($ends_at,false)+1;
        $today = date("Y-m-d");

        $user = ($this->users()
                     ->where('id',Auth::user()->id)->first());
        $checkins = json_decode($user->checkins, true);
        $checkins[$today]++;
        $user->checkins = json_encode($checkins);
        $user->save();

        Checkin::create([
            'user_id' => $user->id,
            'challenge_id' => $user->pivot->challenge_id,
            'created_at' => Carbon::today(),
        ]);

        $days_completed = CheckIn::where('user_id', $user->id)
                        ->where('challenge_id', $this->id)
                        ->count();
        if($days_completed == $daysToComplete) {
            $user->pivot->completed = 1;
            $user->pivot->save();
        }
        $userCheckins = CheckIn::where('user_id', Auth::user()->id)
                    ->where('created_at', Carbon::today())
                    ->count();

        $this->setLevelOfContribution(date("Y-m-d"), $userCheckins);
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

    public function WeekdaysToCheckIn()
    {
        if ($this->type == 2)  {
            $weekdayNumbers = json_decode($this->days_of_week);
            $weekdayNames= [];

            foreach ($weekdayNumbers as $weekdayNumber) {
                // jddayofweek counts weekdays differently than carbon
                // so needs to be reduced by one to sync properly
                $weekdayNames[] = jddayofweek($weekdayNumber-1, 2);
            }
            if ($weekdayNames == ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"]) {
                return ["Everyday"];
            }
            return $weekdayNames;
        }
        return ["Everyday"];


    }

}
