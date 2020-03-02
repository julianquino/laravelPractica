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
            'name' => 'subsudiaries 1, de compañia 1, creador 1',
            'address' => 'avCompany1 sub1',
            'creator_id'=> 1,
        ]);

        DB::table('subsidiaries')->insert([
        	'company_id' => 1,
            'name' => 'subsudiaries 2, de compañia 1, creador 2',
            'address' => 'avCompany1 sub2',
            'creator_id'=> 2,
        ]);

        DB::table('subsidiaries')->insert([
        	'company_id' => 1,
            'name' => 'subsudiaries 3, de compañia 1, creador 1',
            'address' => 'avCompany1 sub3',
            'creator_id'=> 1,
        ]);

        DB::table('subsidiaries')->insert([
        	'company_id' => 2,
            'name' => 'subsudiaries 1 de compañia 2, creador 5',
            'address' => 'avCompany2 sub1',
            'creator_id'=> 5,
        ]);
        DB::table('subsidiaries')->insert([
            'company_id' => 2,
            'name' => 'subsudiaries 1 de compañia 2, creador 5',
            'address' => 'avCompany2 sub1',
            'creator_id'=> 5,
        ]);
    }
}
