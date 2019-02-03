<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Challenge;
use App\Managers\ContributionColorManager;

class ProfileController extends Controller
{

    protected $manager;

    public function __construct(ContributionColorManager $manager)
    {
        $this->manager = $manager;
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $checkins = $user->checkins;
        $checkins = json_decode($checkins,true);


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
            'activeChallengeCount' => $activeChallengeCount,
            'contributionManager' => $this->manager,
            'checkins' => $checkins,
            ]);
    }

}
