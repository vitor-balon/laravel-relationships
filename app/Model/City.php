<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Company;

class City extends Model
{
    protected $fillable = [
        'state_id', 'name', 'initials', 
    ];
    
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_city');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
