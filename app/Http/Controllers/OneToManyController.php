<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        $country = Country::where('name', '=', 'China')->get()->first();
        
        $states = $country->states()->get();

        foreach ($states as $key => $value)
        {
            echo '<hr>' . $value->initials . ' - ' . $value->name;
        }
    }

    public function oneToManyTwo()
    {
        $country = Country::where('name', '=', 'China')->get()->first();
        
        $states = $country->states()->get();

        foreach ($states as $key => $value)
        {
            echo '<hr>' . $value->initials . ' - ' . $value->name . ':';

            foreach ($value->cities()->get() as $key => $value)
            {
                echo "{$value->name}";
            }
        }
    }    

    public function manyToOne()
    {
        $state = State::where('name', 'LIKE', '%a')->get()->first();

        $country = $state->country()->get()->first();

        echo 'Estado: ' . $state->name;

        $country = $state->country()->get()->first();

        echo '<br>';
        echo 'País: ' . $country->name;
    }    
}
