<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Location;
use App\Model\State;
use App\Model\City;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];

    public function location()
    {
        return $this->hasOne(Location::class, 'country_id');
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }    
}
