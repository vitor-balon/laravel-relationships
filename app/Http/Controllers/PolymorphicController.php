<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\City;
use App\Model\State;
use App\Model\Country;
use App\Model\Comment;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        $city = City::where('name', 'Campo Bom')->get()->first();
        echo $city->name;


        $comments = $city->comments()->get();

        foreach($comments as $key => $value)
        {
            echo $value->description;
        }
    }

    public function polymorphicInsert()
    {
        // $city = City::where('name', 'Campo Bom')->get()->first();
        // echo $city->name;

        // $comment = $city->comments()->create([
        //     'description' => "New Comment {$city->name}".date('Ymdhis'),
        // ]);

        // var_dump($comment);

        // ----------------------------------- //

        // $state = State::where('name', 'Flórida')->get()->first();
        // echo $state->name;

        // $comment = $state->comments()->create([
        //     'description' => "New Comment {$state->name}".date('Ymdhis'),
        // ]);

        // var_dump($comment);        

        // ----------------------------------- //

        $country = Country::find(1);
        echo $country->name;

        $comment = $country->comments()->create([
            'description' => "New Comment {$country->name}".date('Ymdhis'),
        ]);

        var_dump($comment); 
    }    
}
