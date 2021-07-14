<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['campus-admin', 'super-admin'];

        foreach($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
        

    }
}
