<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'trainer_id',
        'athlete_id',
        'day_type',
        'carbohydrates',
        'proteins',
        'fats',
        'calories',
    ];

    public function nutrition()
    {
        return $this->belongsTo(Nutrition::class);
    }
}
