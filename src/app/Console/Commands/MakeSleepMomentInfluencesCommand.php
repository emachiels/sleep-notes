<?php

namespace App\Console\Commands;

use App\Models\Influence;
use App\Models\SleepMoment;
use App\Models\SleepMomentInfluence;
use Illuminate\Console\Command;

class MakeSleepMomentInfluencesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:sleep-moment-influences';

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
        $sleepMoments = SleepMoment::query()->get();
        /** @var Influence $drankTeaInfluence */
        $drankTeaInfluence = Influence::query()->where('name', 'Drank tea')->first();
        $workedOutInfluence = Influence::query()->where('name', 'Worked out')->first();
        $traveledInfluence = Influence::query()->where('name', 'Traveled')->first();

        foreach ($sleepMoments as $sleepMoment) {
            /** @var SleepMoment $sleepMoment */
            SleepMomentInfluence::query()->create([
                'sleep_moment_id' => $sleepMoment->getId(),
                'influence_id' => $drankTeaInfluence->getId(),
            ]);

//            SleepMomentInfluence::query()->create([
//                'sleep_moment_id' => $sleepMoment->getId(),
//                'influence_id' => $workedOutInfluence->getId(),
//            ]);
//
//            SleepMomentInfluence::query()->create([
//                'sleep_moment_id' => $sleepMoment->getId(),
//                'influence_id' => $traveledInfluence->getId(),
//            ]);
        }

        return Command::SUCCESS;
    }
}
