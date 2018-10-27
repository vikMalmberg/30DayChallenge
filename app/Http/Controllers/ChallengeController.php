<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Challenge;

class ChallengeController extends Controller
{
    public function index()
    {
       $challenges = Challenge::all();

       return view('challenges.index', [
        'challenges' => $challenges
        ]);
    }
}
