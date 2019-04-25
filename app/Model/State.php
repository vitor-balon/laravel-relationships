<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Country;
use App\Model\City;

class State extends Model
{
    protected $fillable = [
        'country_id', 'name', 'initials'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }    
}
