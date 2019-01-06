<?php


namespace App\Managers;
use App\CheckIn;
use Auth;
use Illuminate\Support\Facades\Cache;

class ContributionColorManager
{


   public function getColorOfDate($day)
    {
        $date = $this->getDateFromDayOfYear($day);
        if (Cache::has($date)) {
            return Cache::get($date);
        } else {

            $userCheckins = CheckIn::where('user_id', Auth::user()->id)
                                ->groupBy('created_at')
                                ->selectRaw('count(*) as total, created_at')
                                ->get();

            $dateColors = [];
            $userCheckins->each(function($userCheckin) use(&$dateColors) {
                if($userCheckin->total >= 1) $dateColors[$userCheckin->created_at] = "low";
                if($userCheckin->total > 2) $dateColors[$userCheckin->created_at] = "medium";
                if($userCheckin->total > 3) $dateColors[$userCheckin->created_at] = "high";
                if($userCheckin->total > 6) $dateColors[$userCheckin->created_at] = "extreme";
            });

            foreach ($dateColors as $day => $color) {
                Cache::put($day, $color, 100);
            }
            if (Cache::has($date)) {
                return Cache::get($date);
            }

        return "none";

        }
    }

    private function getDateFromDayOfYear($dayOfYear)
    {
            $day = intval( $dayOfYear );
            $day = ( $day == 0 ) ? $day : $day - 1;
            $offset = intval( intval( $dayOfYear ) * 86400 );
            $date = date( 'Y-m-d', strtotime( 'Jan 1, ' . date( 'Y' ) ) + $offset );
            return ($date);
    }
}
