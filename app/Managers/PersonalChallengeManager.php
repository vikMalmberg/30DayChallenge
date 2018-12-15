<?php


namespace App\Managers;
use App\CheckIn;
use Auth;
use Carbon\Carbon;


class PersonalChallengeManager
{

    public function setStatus($challenges)
    {
        foreach ($challenges as $challenge) {
            $user = Auth::user();

            $days_completed = CheckIn::where('user_id', $user->id)
                                    ->where('challenge_id', $challenge->id)
                                    ->count();
            $challengeStartDate = Carbon::parse($challenge->starts_at);

            $daysToCompleteToNotFail = $challenge->daysSinceStart();

            if ($challengeStartDate->isFuture()) {
                $challenge->status = "unstarted";
                continue;
            }

            if ($challenge->pivot->completed){
                $challenge->status = "completed";
                continue;
            }

            if ($challenge->pivot->failed_at != null) {
                $challenge->status = "failed";
                continue;
            }

            if ($daysToCompleteToNotFail < $days_completed) {
                $challenge->status = "checked_in";
                continue;
            }

            if ($daysToCompleteToNotFail == $days_completed ) {
                $challenge->status = "available";
                continue;
            }








        }
        return $challenges;
    }

}
