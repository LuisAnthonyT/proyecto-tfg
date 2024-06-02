<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionWorkout extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'workouts_id',
        'exercise',
        'rest',
        'rir',
        'reps',
        'reps',
        'sets',
        'weight_reps',
    ];
}
