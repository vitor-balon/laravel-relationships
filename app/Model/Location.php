<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'latitude', 'longitude'
    ];
    
    public function country()
    {
        return $this->beLongsTo(Country::class);
    }
}
