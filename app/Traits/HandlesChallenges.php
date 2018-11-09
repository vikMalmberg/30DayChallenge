<?php

namespace App\Traits;
use Carbon\Carbon;


trait HandlesChallenges
{
    public function transformDaysToEndingDate($challenge)
    {
        $startingDate = Carbon::parse($challenge['starts_at']);
        $endingDate = $startingDate->addDays($challenge['days']);
        $challenge['ends_at'] = $endingDate;

        unset($challenge['days']);

        return $challenge;
    }

}
