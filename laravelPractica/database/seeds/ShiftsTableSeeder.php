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
            'name' => 'turnera 1 de subsidiary 1, creador 1',
            'prefix' => 'A',
            'turn' => '01',
            'creator_id'=> 1,
        ]);

        DB::table('shifts')->insert([
        	'subsidiary_id' => 1,
            'name' => 'turnera 2 de subsidiary 1, creador 2',
            'prefix' => 'B',
            'turn' => '02',
            'creator_id'=> 2,
        ]);

        DB::table('shifts')->insert([
        	'subsidiary_id' => 1,
            'name' => 'turnera 3 de subsidiary 1, creador 3',
            'prefix' => 'C',
            'turn' => '03',
            'creator_id'=> 3,
        ]);

        DB::table('shifts')->insert([
        	'subsidiary_id' => 1,
            'name' => 'turnera 4 de subsidiary 1, creador 1',
            'prefix' => 'D',
            'turn' => '04',
            'creator_id'=> 1,
        ]);


        DB::table('shifts')->insert([
        	'subsidiary_id' => 2,
            'name' => 'turnera 1 de subsidiary 2, creador 1',
            'prefix' => 'A',
            'turn' => '01',
            'creator_id'=> 1,
        ]);
        DB::table('shifts')->insert([
        	'subsidiary_id' => 2,
            'name' => 'turnera 2 de subsidiary 2, creador 1',
            'prefix' => 'B',
            'turn' => '02',
            'creator_id'=> 1,
        ]);
        DB::table('shifts')->insert([
        	'subsidiary_id' => 2,
            'name' => 'turnera 3 de subsidiary 2, creador 1',
            'prefix' => 'C',
            'turn' => '03',
            'creator_id'=> 1,
        ]);

        DB::table('shifts')->insert([
        	'subsidiary_id' => 3,
            'name' => 'turnera 1 de subsidiary 3, creador 1',
            'prefix' => 'A',
            'turn' => '01',
            'creator_id'=> 1,
        ]);

    }
}
