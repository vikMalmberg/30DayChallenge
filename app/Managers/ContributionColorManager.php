<?php


namespace App\Managers;

use Illuminate\Support\Facades\Cache;
use App\Traits\HandlesContributions;
use App\CheckIn;
use Auth;

class ContributionColorManager
{
    use HandlesContributions;

    public function getColorOfDate($day)
    {
        $date = $this->getDateFromDayOfYear($day);
        if (! Cache::has('seeded')) {
            $userCheckins = CheckIn::where('user_id', Auth::user()->id)
                                ->groupBy('created_at')
                                ->selectRaw('count(*) as total, created_at')
                                ->get();
            foreach ($userCheckins as $userCheckin) {
                $this->setLevelOfContribution(
                                            $userCheckin->created_at,
                                            $userCheckin->total
                                    );
            }
            Cache::put('seeded', 1, 1000000);
        }

        if (Cache::has($date)) {
            return Cache::get($date);
        } else {
            return "none";
        }
    }

    private function getDateFromDayOfYear($dayOfYear)
    {
        $day = intval($dayOfYear);
        $day = ($day == 0) ? $day : $day - 1;
        $offset = intval(intval($dayOfYear) * 86400);
        $date = date('Y-m-d', strtotime('Jan 1, ' . date('Y')) + $offset);
        return ($date);
    }

}

