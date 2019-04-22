<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Location;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];

    public function location()
    {
        return $this->hasOne(Location::class, 'country_id');
    }
}
