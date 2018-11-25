<?php


namespace App\Managers;

class PersonalChallengeManager
{

    public function setStatus($challenges)
    {
        foreach ($challenges as $challenge) {
            $startMinusCompleted = $challenge->daysSinceStart()-$challenge->pivot->days_completed;
            if($challenge->pivot->completed){
                $challenge->status = "completed";
                continue;
            }
            if ($startMinusCompleted == 1 ) {
                $challenge->status = "available";
                continue;
            }
            if ($startMinusCompleted == 0 ) {
                $challenge->status = "checked_in";
                continue;
            }
            if ($startMinusCompleted > 1 ) {
                $challenge->status = "failed";
                continue;
            }
            if ($startMinusCompleted < 0 ) {
                $challenge->status = "unstarted";
                continue;
            }
        }
        return $challenges;
    }

}
