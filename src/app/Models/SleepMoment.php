<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class SleepMoment extends Model
{
    use HasUlids;
    use SoftDeletes;

    protected $table = 'sleep_moments';
    protected $fillable = ['score'];

    public function getId(): string
    {
        return $this->id;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function influences(): HasManyThrough
    {
        return $this->hasManyThrough(
            Influence::class,
            SleepMomentInfluence::class,
            'sleep_moment_id',
            'id',
            'id',
            'influence_id'
        );
    }
}
