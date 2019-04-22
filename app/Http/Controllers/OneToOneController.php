<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Country;
use App\Model\Location;

class OneToOneController extends Controller
{
    public function OneToOne()
    {
        // MÉTODO USADO SOMENTE PARA FAZER SELECT PELO ID
        // $country = Country::find(1);

        $country = Country::where('name', 'China')->get()->first();

        echo $country->name;
        $location = $country->location()->get()->first();
        echo "<hr>Latitude: {$location->latitude}<br>";
        echo "Latitude: {$location->longitude}<br>";
    }

    public function OneToOneInverse()
    {
        $latitude = 44;
        $longitude = 24;

        $location = Location::where('latitude', $latitude)->where('longitude', $longitude)->get()->first();

        echo $location->id;
        echo '<hr>';
        $country = $location->country()->get()->first();
        echo $country->name;
    }

    public function OneToOneInsert()
    {
        $dataForm = array(
            'name' => 'País Novo',
            'latitude' => 45,
            'longitude' => 33,
        );

        $country = Country::create($dataForm);
        

        // $location = new Location;
        // $location->latitude = $dataForm['latitude'];
        // $location->longitude = $dataForm['longitude'];
        // $location->country_id = $country->id;
        // $save = $location->save();

        $location = $country->location()->create($dataForm);

        echo '<pre>';
        print_r($location);
        echo '</pre>';
    }
}
