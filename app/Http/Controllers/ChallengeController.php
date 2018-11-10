<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Challenge;
use Auth;
use App\Traits\HandlesChallenges;

class ChallengeController extends Controller
{
    use HandlesChallenges;

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
       $challenges = Challenge::all();

       return view('challenges.index', [
        'challenges' => $challenges
        ]);
    }

    public function create()
    {
        return view('challenges.create');
    }

    public function store(Request $request)
    {
        $challenge = $request->validate([
            'name' => 'required',
            'points' => 'required',
            'days' => 'required',
            'starts_at' => 'required'
        ]);

        $challenge = $this->transformDaysToEndingDate($challenge);
        Challenge::create($challenge);

        return redirect()->route('challenges.index');
    }

    public function show(Challenge $challenge)
    {
        return view('challenges.show', ['challenge' => $challenge]);
    }
}
