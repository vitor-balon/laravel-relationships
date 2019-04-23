<?php

use Illuminate\Database\Seeder;

use App\Model\Location;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = array(
            array('country_id' => 1, 'latitude' => 45, 'longitude' => 12),
            array('country_id' => 2, 'latitude' => 22, 'longitude' => 19),
            array('country_id' => 3, 'latitude' => 49, 'longitude' => 47),
            array('country_id' => 4, 'latitude' => 35, 'longitude' => 36)
        );

        foreach($locations as $key => $value)
        {
            if(Location::where('country_id', '=', $value['country_id'])->count())
            {
                $location = Location::where('country_id', '=', $value['country_id'])->first();
                $location->update($value);
            }
            else
            {
                Location::create($value);
            }
        }
    }
}
