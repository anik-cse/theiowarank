<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Slider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'sort_description',
        'long_description',
        'animation_id',
        'status',
    ];

    /**
     * The roles that belong to the user.
     */
    public function animation()
    {
        return $this->belongsToMany(Animation::class);
    }

    /**
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        if (static::whereSlug($slug = Str::slug($value))->exists()) {

            $slug = $this->incrementSlug($slug);
        }
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = $slug;
    }

    /** 
     * Write code on Method
     *
     * @return response()
     */
    public function incrementSlug($slug) 
    {
        $original = $slug;
        $count = 2;
    
        while (static::whereSlug($slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }
}
