<?php

use Illuminate\Database\Seeder;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shifts')->insert([
        	'subsidiary_id' => 1,
            'name' => 'turnera 1',
            'prefix' => 'A',
            'turn' => 99,
            'creator_id'=> 1,
        ]);

        DB::table('shifts')->insert([
        	'subsidiary_id' => 1,
            'name' => 'turnera 2',
            'prefix' => 'B',
            'turn' => '02',
            'creator_id'=> 3,
        ]);

        DB::table('shifts')->insert([
        	'subsidiary_id' => 1,
            'name' => 'turnera 3',
            'prefix' => 'C',
            'turn' => '03',
            'creator_id'=> 4,
        ]);

        DB::table('shifts')->insert([
        	'subsidiary_id' => 2,
            'name' => 'turnera 4',
            'prefix' => 'D',
            'turn' => '04',
            'creator_id'=> 4,
        ]);

        DB::table('shifts')->insert([
        	'subsidiary_id' => 3,
            'name' => 'turnera 5',
            'prefix' => 'A',
            'turn' => '01',
            'creator_id'=> 6,
        ]);
        DB::table('shifts')->insert([
        	'subsidiary_id' => 3,
            'name' => 'turnera 6',
            'prefix' => 'B',
            'turn' => '02',
            'creator_id'=> 6,
        ]);

    }
}
