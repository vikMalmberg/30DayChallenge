<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Challenge;

class ProfileController extends Controller
{

    public function index()
    {
        $completedChallengeCount = Auth::user()->challenges()
                                ->where('completed', true)
                                ->count();

        $failedChallengeCount = Auth::user()->challenges()
                            ->whereNotNull('failed_at')
                            ->count();

        $activeChallengeCount = Auth::user()->challenges()
                                ->whereNull('failed_at')
                                ->where('completed', false)
                                ->count();


        return view('profile.index', [
            'completedChallengeCount' => $completedChallengeCount,
            'failedChallengeCount' => $failedChallengeCount,
            'activeChallengeCount' => $activeChallengeCount
            ]);
    }

}
