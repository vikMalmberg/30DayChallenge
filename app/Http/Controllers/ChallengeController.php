<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Challenge;
use Carbon\Carbon;

class ChallengeController extends Controller
{
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
        $request->validate([
            'name' => 'required',
            'points' => 'required',
            'days' => 'required',
            'starts_at' => 'required'
        ]);

        $startingDate = Carbon::parse($request->starts_at);
        $endingDate = $startingDate->addDays(30);

        Challenge::create([
            'name' => $request->name,
            'points' => $request->points,
            'starts_at' => $request->starts_at,
            'ends_at' => $endingDate,
        ]);

        $challenges = Challenge::all();
        return view('challenges.index', [
            'challenges' => $challenges
        ]);

    }
}