<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(SubsidiariesTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(Roles_UsersTableSeeder::class);
    }
}
