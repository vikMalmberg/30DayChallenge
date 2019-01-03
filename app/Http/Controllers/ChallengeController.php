<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Challenge;
use Auth;
use App\Traits\HandlesChallenges;
use Carbon\Carbon;
use App\User;
use DateTime;

class ChallengeController extends Controller
{
    use HandlesChallenges;

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {

        $today = Carbon::today();
        $challenges = Challenge::where('starts_at', '>=', $today)->paginate(10);
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
            'description' => '',
            'duration' => 'required',
            'starts_at' => 'required|date',
            'type' => 'required|exists:challenge_types,id',
            'days_of_week' => 'required_if:type,2',
        ]);


        if (isset($challenge['days_of_week'])) {
            $challenge['days_of_week'] = json_encode($challenge['days_of_week']);
        }

        $challenge = $this->transformDurationToEndingDate($challenge);

        Challenge::create($challenge);

        return redirect()->route('challenges.index')->with('message', 'Successfully created challenge');
    }

    public function show(Challenge $challenge)
    {
        return view('challenges.show', ['challenge' => $challenge]);
    }
}
