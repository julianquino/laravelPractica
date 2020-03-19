<?php

use Illuminate\Database\Seeder;

class SubsidiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subsidiaries')->insert([
        	'company_id' => 1,
            'name' => 'Sucursal 1',
            'address' => 'direccion de sucursal 1',
            'creator_id'=> 1,
        ]);

        DB::table('subsidiaries')->insert([
        	'company_id' => 1,
            'name' => 'Sucursal 2',
            'address' => 'direccion de sucursal 2',
            'creator_id'=> 2,
        ]);

        DB::table('subsidiaries')->insert([
        	'company_id' => 2,
            'name' => 'Sucursal 3',
            'address' => 'direccion de sucursal 3',
            'creator_id'=> 6,
        ]);

    }
}
