<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\Challenge;
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
        $challenges = Challenge::all();
        foreach ($challenges as $challenge){
            $challengeStartsAt = Carbon::parse($challenge->starts_at);
            foreach ($challenge->users as $user){
                $today = Carbon::now();
                $daysSinceChallengeStarted = $challengeStartsAt->diffInDays($today,false);
                if ( ($user->pivot->days_completed - $daysSinceChallengeStarted) <= 1) {
                    $user->pivot->failed = 1;
                    $user->pivot->save();
                }
            }
        }
    }
}
