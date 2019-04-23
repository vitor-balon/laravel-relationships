<?php

use Illuminate\Database\Seeder;

use App\Model\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array('id' => 1,'state_id' => 1, 'name' => 'New York', 'initials' => 'NY'),
            array('id' => 2,'state_id' => 2, 'name' => 'Campo Bom', 'initials' => 'CB'),
            array('id' => 3,'state_id' => 3, 'name' => 'Novo Hamburgo', 'initials' => 'NH'),
            array('id' => 4,'state_id' => 4, 'name' => 'São Leopoldo', 'initials' => 'SL')
        );

        foreach($cities as $key => $value)
        {
            if(City::where('name', '=', $value['name'])->count())
            {
                $city = City::where('name', '=', $value['name'])->first();
                $city->update($value);
            }
            else
            {            
                City::create($value);
            }
        }
    }
}
