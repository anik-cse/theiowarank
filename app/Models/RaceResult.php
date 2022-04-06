<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'race',
        'racer',
        'place',
    ];

    /**
     * Get the winner
     */
    public function winnerinfo()
    {
        return $this->hasOne(Riders::class, 'id', 'racer');
    }
}
