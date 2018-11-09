<?php


namespace App\Managers;

class PersonalChallengeManager
{

    public function setStatus($challenges)
    {
        foreach ($challenges as $challenge) {
            $startMinusCompleted = $challenge->daysSinceStart()-$challenge->pivot->days_completed;
            if ($startMinusCompleted == 1 ) {
                $challenge->status = "available";
            }
            if ($startMinusCompleted == 0 ) {
                $challenge->status = "checked_in";
            }
            if ($startMinusCompleted > 1 ) {
                $challenge->status = "failed";
            }
        }
        return $challenges;
    }

}
