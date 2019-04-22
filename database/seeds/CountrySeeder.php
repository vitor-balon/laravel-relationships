<?php

use Illuminate\Database\Seeder;

use App\Model\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = array(
            array('id' => 1, 'name' => 'China'),
            array('id' => 2, 'name' => 'Brazil'),
            array('id' => 3, 'name' => 'EUA'),
            array('id' => 4, 'name' => 'Japan')
        );

        foreach($countries as $key => $value)
        {
            if(Country::where('name', '=', $value['name'])->count())
            {
                $country = Country::where('email', '=', $value['name'])->first();
                $country->update($value);
            }
            else
            {
                Country::create($value);
            }
        }
    }
}
