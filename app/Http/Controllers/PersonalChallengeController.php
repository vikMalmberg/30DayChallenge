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
        $this->middleware('auth');
    }

    public function index()
    {
        $challenges = User::where('id',Auth::user()->id)
                                ->first()
                                ->challenges()
                                ->get();
        $challenges = $this->manager->setStatus($challenges);

           return view('personalChallenges.index', [
            'challenges' => $challenges
        ]);
    }
    public function store()
    {

        $challenge = Challenge::find(request('challenge_id'));

        $challenge->users()->attach(Auth::user()->id);

        return redirect()->route('challenges.index');

    }

    public function update(Challenge $challenge)
    {
        $challenge->checkIn($challenge);
        return redirect()->route('personal.challenges.index')->with('message', 'Successfully checked in');
    }

}
