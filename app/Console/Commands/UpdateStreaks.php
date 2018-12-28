<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Challenge;
use App\User;use Carbon\Carbon;


class UpdateStreaks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'challenges:UpdateStreak';

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
        $users = User::with('challenges')->get();
        foreach($users as $user) {
            $streak = 0;
            $unfailedChallengesForThisUser = $user->challenges()
                                            ->where('failed_at', null)
                                            ->get();

            foreach($unfailedChallengesForThisUser as $unfailedChallenge) {
                $daysSinceStart = Carbon::parse($unfailedChallenge->starts_at)
                        ->diffInDays(Carbon::now(),false);
                if ($daysSinceStart>$streak) {
                    $streak = $daysSinceStart;
                }
            }
            $user->streak = $streak;
            $user->save();
        }
    }
}
