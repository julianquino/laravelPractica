<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'duenioCompania1',
            'email' => 'duenioCompania1@gmail.com',
            'company_id'=> 1,
            'password' => bcrypt('contraseña')
        ]);

        DB::table('users')->insert([
            'name' => 'creadorSubsidiary2',
            'email' => 'creadorSubsidiary2@gmail.com',
            'company_id'=> 1,
            'password' => bcrypt('contraseña')
        ]);

        DB::table('users')->insert([
            'name' => 'creadorTurnera3',
            'email' => 'creadorTurnera3@gmail.com',
            'company_id'=> 1,
            'password' => bcrypt('contraseña')
        ]);

        DB::table('users')->insert([
            'name' => 'comun',
            'email' => 'comun@gmail.com',
            'company_id'=> 1,
            'password' => bcrypt('contraseña')
        ]);

        DB::table('users')->insert([
            'name' => 'pablo',
            'email' => 'pablo@gmail.com',
            'company_id'=> 2,
            'password' => bcrypt('contraseña')
        ]);
    }
}
