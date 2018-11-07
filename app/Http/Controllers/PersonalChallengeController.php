<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\User;
use Auth;
use App\Managers\PersonalChallengeManager;


class PersonalChallengeController extends Controller
{

    protected $manager;

    public function __construct(PersonalChallengeManager $manager)
    {
        $this->manager = $manager;
    }

    public function index()
    {
        $challenges = User::where('id',Auth::user()->id)->first()->challenges;
        $challenges = $this->manager->setStatus($challenges);

           return view('personalChallenges.index', [
            'challenges' => $challenges
        ]);
    }

}
