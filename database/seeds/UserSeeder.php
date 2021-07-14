<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::whereName('campus-admin')->get();
        
        
        factory(User::class,20)->create()->each(function($user){
            $user->role()->attach(Role::whereName('campus-admin')->get());
            // $user->role()->create([
            //     'name' => 'campus-admin'
            // ]);
        });
    }
}
