<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'length',
        'class',
        'notes',
    ];

    /**
     * Get the results associated with the races.
     */
    public function results()
    {
        return $this->hasMany(RaceResult::class, 'race')->with('racers');
    }
}
