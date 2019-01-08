<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Challenge;
use App\CheckIn;

trait HandlesContributions
{
    public function setLevelOfContribution($date, $checkins)
    {
        if ($checkins >=5) {
            Cache::put($date, "extreme", 1000000);
            return true;
        }

        if ($checkins >=3) {
            Cache::put($date, "high", 1000000);
            return true;
        }

        if ($checkins >=2) {
            Cache::put($date, "medium", 1000000);
            return true;
        }

        if ($checkins >=1) {
            Cache::put($date, "low", 1000000);
            return true;
        }
    }
}
