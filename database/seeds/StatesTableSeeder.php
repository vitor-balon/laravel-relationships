<?php

use Illuminate\Database\Seeder;

use App\Model\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = array(
            array('id' => 1,'country_id' => 1, 'name' => 'Texas', 'initials' => 'TE'),
            array('id' => 2,'country_id' => 2, 'name' => 'Califórnia', 'initials' => 'CA'),
            array('id' => 3,'country_id' => 3, 'name' => 'Flórida', 'initials' => 'FL'),
            array('id' => 4,'country_id' => 4, 'name' => 'Washington', 'initials' => 'WA')
        );

        foreach($states as $key => $value)
        {
            if(State::where('name', '=', $value['name'])->count())
            {
                $state = State::where('name', '=', $value['name'])->first();
                $state->update($value);
            }
            else
            {            
                State::create($value);
            }
        }        
    }
}
