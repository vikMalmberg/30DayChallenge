<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Challenge;
use App\CheckIn;
use Carbon\Carbon;

class CheckFailedChallengesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'failedChallenges:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // echo"checking which challenges are failed \n";
        $challenges = Challenge::with('users')->get();
        // echo($challenges);

        foreach($challenges as $challenge) {

            $challengeStartsAt = Carbon::parse($challenge->starts_at);
            $challengeEndsAt = Carbon::parse($challenge->ends_at);
            $today = Carbon::now();

            $daysToComplete = $challengeStartsAt->diffInDays($challengeEndsAt,false)+1;
            $daysSinceChallengeStarted = $challengeStartsAt->diffInDays($today,false);

            //get each challenge
            foreach ($challenge->users as $user) {
                //get each user signed up to this challenge

                //if this challenge_user isnt failed or completed make a check if it should be
                if ($user->pivot->failed_at == null && $user->pivot->completed == false) {
                    // check the amouunt of checkins of this user & this challenge in checkins table
                    $checkins = CheckIn::where('user_id', $user->id)
                                    ->where('challenge_id', $challenge->id)
                                    ->count();
                    if ($daysSinceChallengeStarted >= $checkins) {
                        $user->pivot->failed_at = $today;
                        $user->pivot->save();
                        echo("user: " . $user->id . " failed challenge: " .$user->pivot->challenge_id ."\n");
                    }
                    if ($checkins == $daysToComplete) {
                        $user->pivot->completed = true;
                        $user->pivot->save();
                        echo("user: " . $user->id . " failed completed: " .$user->pivot->challenge_id ."\n");
                    }
                }
            }
        }
    }
}
