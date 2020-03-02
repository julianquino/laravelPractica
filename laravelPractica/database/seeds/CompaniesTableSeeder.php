<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'owner_id' => 1,
            'name' => 'Compañia 1',
            'description' => 'esta compañia es la 1'
        ]);

        DB::table('companies')->insert([
            'owner_id' => 5,
            'name' => 'Compañia 2',
            'description' => 'esta compañia es la 2'
        ]);
    }
}
