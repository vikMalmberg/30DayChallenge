<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Challenge;
use App\CheckIn;

trait ChecksIfChallengeFailed
{
    public function checkIfHasBeenFailed($challenge)
    {

      if ($challenge->type == 1) {
        $this->checkIfEverydayChallengeHasFailedFor($challenge->users, $challenge);
      }
      if ($challenge->type == 2) {
        $this->checkIfSpecificDayHasFailed($challenge->users, $challenge);
      }

    }

    protected function checkIfEverydayChallengeHasFailedFor($usersSignedUpForThisChallenge)
    {
        $today = Carbon::today();
        foreach ($usersSignedUpForThisChallenge as $userSignedUpForThisChallenge) {
            if ($this->userFailedThisChallenge($userSignedUpForThisChallenge)) {
                $userSignedUpForThisChallenge->pivot->failed_at = $today;
                $userSignedUpForThisChallenge->pivot->save();
            }

        }
    }

    protected function checkIfSpecificDayHasFailed($usersSignedUpForThisChallenge, $challenge)
    {
        if ($this->ChallengeIsSupposedToBeCheckedInToday($challenge)) {
            $today = Carbon::today();
            foreach ($usersSignedUpForThisChallenge as $userSignedUpForThisChallenge) {
                if ($this->userFailedThisChallenge($userSignedUpForThisChallenge)) {
                    $userSignedUpForThisChallenge->pivot->failed_at = $today;
                    $userSignedUpForThisChallenge->pivot->save();
                }
            }
        }

    }

    protected function ChallengeIsSupposedToBeCheckedInToday($challenge)
    {
        $dayOfWeek = Carbon::today()->dayOfWeekIso;

        if (in_array($dayOfWeek, json_decode($challenge->days_of_week))) {
            return true;
        }
        return false;
    }

    protected function userFailedThisChallenge($userSignedUpForThisChallenge)
    {
        $userChallengeConnection = $userSignedUpForThisChallenge->pivot;
        $today = Carbon::today();

        $checkInsToday = Checkin::where('user_id', $userChallengeConnection->user_id)
                    ->where('challenge_id', $userChallengeConnection->challenge_id )
                    ->where('created_at', $today)
                    ->count();

        if ($checkInsToday < 1) {
            return true;
        }
        return false;
    }




}
