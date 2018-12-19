<?php

namespace App\Traits;
use Carbon\Carbon;
use App\Challenge;


trait HandlesChallenges
{
    public function transformDurationToEndingDate($challenge)
    {
        $startingDate = Carbon::parse($challenge['starts_at']);
        $addDuration = 'add'.$challenge['duration'];
        $challenge['ends_at'] = $startingDate->$addDuration();
        unset($challenge['duration']);

        return $challenge;
    }
    public function getChallengesForUser($user)
    {

        $everyDayChallenges = $this->everyDayChallenges($user);
        $specificDayChallenges = $this->specificDayChallenges($user);

        return $everyDayChallenges->merge($specificDayChallenges);

    }

    protected function everyDayChallenges($user)
    {
        return $user->belongsToMany(Challenge::class)
        ->withPivot('failed_at','completed')
        ->where('type',1)
        ->get();
    }
    protected function specificDayChallenges($user)
    {

        $specificChallenges = $user->belongsToMany(Challenge::class)
        ->withPivot('failed_at','completed')
        ->where('type',2)
        ->get();

        return $this->specificDayChallengesVisibleToday($specificChallenges);

    }

    protected function specificDayChallengesVisibleToday($specificChallenges)
    {
        return  $specificChallenges->reject(function ($challenge){
            $today = Carbon::now()->dayOfWeekIso;
            return !in_array($today, json_decode($challenge->days_of_week));
        });
    }

}
