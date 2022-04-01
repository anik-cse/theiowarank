<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'event',
        'race',
        'racer',
        'place',
    ];

    /**
     * Get the riders associated with the result.
     */
    public function racers()
    {
        return $this->hasMany(Riders::class, 'id', 'racer');
    }
}
