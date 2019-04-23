<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;
use App\Model\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::where('name', '=', 'Campo Bom')->get()->first();

        echo $city->name;

        $companies = $city->companies()->get();

        echo '<br>';
        echo '<br>';
        echo 'Empresas: ';
        echo '<br>';

        foreach($companies as $key => $value)
        {
            echo $value->name;
        }
    }

    public function manyToManyInverse()
    {
        $company = Company::where('name', 'Google')->get()->first();
        echo "<b>{$company->name}: </b><br>";
        
        $cities = $company->cities;

        foreach($cities as $key => $value)
        {
            echo "{$value->name}, ";
        }
    }
}
