<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SleepMomentInfluence extends Model
{
    use HasUlids;
    use SoftDeletes;

    protected $table = 'sleep_moment_influences';
    protected $fillable = [
        'sleep_moment_id',
        'influence_id'
    ];
}
