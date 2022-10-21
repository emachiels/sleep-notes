<?php

namespace App\Console\Commands;

use App\Models\SleepMoment;
use Illuminate\Console\Command;

class GetInfluenceOnSleepMomentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-influence-on-sleep-moment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sleepMoments = SleepMoment::query()->with('influences')->get();
        $averageSleepScore = $sleepMoments->avg('score');
        $influenceScoreToAverage = [];

        foreach ($sleepMoments as $sleepMoment) {
            foreach ($sleepMoment->influences as $influence) {
                $influenceScoreToAverage[$influence->getName()][] = $sleepMoment->getScore() - $averageSleepScore;
            }
        }

        $result = [];

        foreach ($influenceScoreToAverage as $name => $scores) {
            $result[] = ['name' => $name, 'influence_score' => array_sum($scores) / count($scores)];
        }

        $this->table(['Influence', 'Score'], $result);

        return self::SUCCESS;
    }
}
