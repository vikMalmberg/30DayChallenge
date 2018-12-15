<?php

namespace App\Traits;
use Carbon\Carbon;


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

}
