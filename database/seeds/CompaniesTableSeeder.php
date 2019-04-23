<?php

use Illuminate\Database\Seeder;

use App\Model\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = array(
            array('id' => 1, 'name' => 'Microsoft'),
            array('id' => 2, 'name' => 'Google'),
            array('id' => 3, 'name' => 'Asus'),
            array('id' => 4, 'name' => 'Apple')
        );

        foreach($companies as $key => $value)
        {
            if(Company::where('name', '=', $value['name'])->count())
            {
                $company = Company::where('name', '=', $value['name'])->first();
                $company->update($value);
            }
            else
            {
                Company::create($value);
            }
        }
    }
}
