<?php


namespace App\Managers;

use App\Traits\HandlesContributions;
use App\CheckIn;
use Auth;

class ContributionColorManager
{
    use HandlesContributions;

    public function getColorOfDate($day)
    {
        $dateOfDay = $this->getDateFromDayOfYear($day);
        $contributionsOnDay = $this->checkinsOfSignedInUser()[$dateOfDay];
        return $this->checkinLevelAchieved($contributionsOnDay);
    }

    private function getDateFromDayOfYear($dayOfYear)
    {
        $day = intval($dayOfYear);
        $day = ($day == 0) ? $day : $day - 1;
        $offset = intval(intval($dayOfYear) * 86400);
        $date = date('Y-m-d', strtotime('Jan 1, ' . date('Y')) + $offset);
        return ($date);
    }

    private function checkinsOfSignedInUser()
    {
        $user = Auth::user();
        $checkins = $user->checkins;
        $checkins = json_decode($checkins,true);
        return $checkins;
    }

    private function checkinLevelAchieved($contributionsOnDay) {
        if($contributionsOnDay == 0) return "none";
        if($contributionsOnDay >= 7) return "extreme";
        if($contributionsOnDay >= 5) return "high";
        if($contributionsOnDay >= 3) return "medium";
        if($contributionsOnDay >= 1) return "low";

    }

}

