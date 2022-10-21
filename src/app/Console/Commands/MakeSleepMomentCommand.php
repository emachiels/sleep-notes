<?php

namespace App\Console\Commands;

use App\Models\SleepMoment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MakeSleepMomentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:sleep-moment';

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
        $times = $this->ask('How many times?');
        $betweenScores = $this->ask('Between scores? (format x-x)');
        [$minScore, $maxScore] = explode('-', $betweenScores);
        $result = collect([]);

        for ($i = 0; $i < $times; $i++) {
            $moment = new SleepMoment([
                'score' => random_int($minScore, $maxScore)
            ]);
            $moment->save();
            $result->push($moment);
        }

        $this->info('Created sleep moment:');
        $this->table(['id', 'score'], $result->map(fn (SleepMoment $moment) => [
            $moment->getId(),
            $moment->getScore(),
        ]));

        return self::SUCCESS;
    }
}
