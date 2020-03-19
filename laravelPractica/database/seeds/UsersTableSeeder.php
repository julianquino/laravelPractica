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
            'name' => 'Oscar',
            'email' => 'oscar@gmail.com',
            'company_id'=> 1,
            'password' => bcrypt('contraseña')
        ]);

        DB::table('users')->insert([
            'name' => 'Julian',
            'email' => 'julian@gmail.com',
            'company_id'=> 1,
            'password' => bcrypt('contraseña')
        ]);

        DB::table('users')->insert([
            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'company_id'=> 1,
            'password' => bcrypt('contraseña')
        ]);

        DB::table('users')->insert([
            'name' => 'Cristian',
            'email' => 'cristian@gmail.com',
            'company_id'=> 1,
            'password' => bcrypt('contraseña')
        ]);

        DB::table('users')->insert([
            'name' => 'Pablo',
            'email' => 'pablo@gmail.com',
            'company_id'=> 2,
            'password' => bcrypt('contraseña')
        ]);

        DB::table('users')->insert([
            'name' => 'Gaston',
            'email' => 'gaston@gmail.com',
            'company_id'=> 2,
            'password' => bcrypt('contraseña')
        ]);
    }
}
