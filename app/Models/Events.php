<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'venue',
        'address_one',
        'address_two',
        'city',
        'region',
        'post_code',
        'country',  
        'type',  
        'tier',  
        'organization',  
        'email',  
        'phone',  
    ];

    /**
     * Get the type associated with the event.
     */
    public function type()
    {
        return $this->hasOne(EventType::class, 'id', 'type');
    }

    /**
     * Get the tire associated with the event.
     */
    public function tier()
    {
        return $this->hasOne(EventTier::class, 'id', 'tier');
    }

    /**
     * Get the country associated with the event.
     */
    public function country()
    {
        return $this->hasOne(Countries::class, 'id','country');
    }

    /**
     * Get the races associated with the event.
     */
    public function races()
    {
        return $this->hasMany(Race::class, 'event')->with('results');
    }
}
