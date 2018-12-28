<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Challenge;
use App\CheckIn;
use Carbon\Carbon;
use App\Traits\ChecksIfChallengeFailed;

class CheckFailedChallengesCommand extends Command
{
    use ChecksIfChallengeFailed;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'challenges:CheckFailedChallenges';

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
        $challenges = Challenge::with('users')->get();
        foreach ($challenges as $challenge) {
            $this->checkIfHasBeenFailed($challenge);
        }
    }
}

