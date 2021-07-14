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
        
        $this->call(CampusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SebakiSeeder::class);
        $this->call(TesebakiSeeder::class);
        $this->call(UserSeeder::class);
    }
}
