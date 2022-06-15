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
        'event',
        'notes',
    ];

    /**
     * Get the type associated with the races.
     */
    public function race_type()
    {
        return $this->hasOne(RaceType::class, 'id', 'type');
    }

    /**
     * Get the type associated with the races.
     */
    public function race_length()
    {
        return $this->hasOne(RaceLength::class, 'id', 'length');
    }

    /**
     * Get the results associated with the races.
     */
    public function results()
    {
        return $this->hasMany(RaceResult::class, 'race')->with('winnerinfo')->orderBy('place', 'asc');
    }

    public function events()
    {
        return $this->hasOne(Events::class, 'id', 'event');
    }
    // /**
    //  * Get the winner associated with the races.
    //  */
    // public function race_winner()
    // {
    //     return $this->hasOne(RaceResult::class, 'race')->with('winnerinfo')->where('place', 1);
    // }
}
