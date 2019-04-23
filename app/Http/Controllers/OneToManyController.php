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
    
    public function oneToManyInsert()
    {
        $dataForm = array(
            'name' => 'Bahia',
            'initials' => 'BA',
        );

        $country = Country::find(1);

        $insertState = $country->states()->create($dataForm);

        dd($insertState);
    }

    public function oneToManyInsertTwo()
    {
        $dataForm = array(
            'name' => 'Rio Grande do Sul',
            'initials' => 'RS',
            'country_id' => 2
        );

        $insertState = State::create($dataForm);

        dd($insertState);        
    }

    public function hasManyThrough()
    {
        $country = Country::find(1);
        echo "<b>{$country->name}</b><br>";

        $cities = $country->cities;

        foreach($cities as $key => $value)
        {
            echo "{$value->name}";
        }

        echo "<br>Total Cidades: {$cities->count()}";
    }
}
