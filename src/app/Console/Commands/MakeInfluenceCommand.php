<?php

namespace App\Console\Commands;

use App\Models\Influence;
use Illuminate\Console\Command;

class MakeInfluenceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:influence';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an influence';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $type = $this->choice('What type of influence is this?', ['user', 'system']);
        $name = $this->ask('What name?');

        Influence::query()->create([
            'type' => $type,
            'name' => $name
        ]);

        return self::SUCCESS;
    }
}
