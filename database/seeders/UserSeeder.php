<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin =  Role::where('name', 'admin')->first();
        $roleUser = Role::where('name', 'user')->first();
        
        // creating new admin
        $newAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@test.app',
            'password' => bcrypt('secret')
        ]);
        $newAdmin->roles()->attach($roleAdmin);

        /// creating new user
        $newUser = User::create([
            'name' => 'user',
            'email' => 'user@test.app',
            'password' => bcrypt('secret')
        ]);
        $newUser->roles()->attach($roleUser);
    }
}
