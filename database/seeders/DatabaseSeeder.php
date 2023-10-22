<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        Role::create([
            'role_id' => 1,
            'name' => 'Admin'
        ]);

        Role::create([
            'role_id' => 2,
            'name' => 'Warehouse'
        ]);

        Role::create([
            'role_id' => 3,
            'name' => 'Manager'
        ]);

        Role::create([
            'role_id' => 4,
            'name' => 'Order'
        ]);

        Role::create([
            'role_id' => 5,
            'name' => 'Production'
        ]);

        User::create([
            'id' => 1,
            'role_id' => 1,
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password123')
        ]);

        User::create([
            'id' => 2,
            'role_id' => 2,
            'name' => 'Warehouse',
            'email' => 'warehouse@mail.com',
            'password' => bcrypt('password123')
        ]);

        User::create([
            'id' => 3,
            'role_id' => 3,
            'name' => 'Manager',
            'email' => 'manager@mail.com',
            'password' => bcrypt('password123')
        ]);

        User::create([
            'id' => 4,
            'role_id' => 4,
            'name' => 'Order',
            'email' => 'order@mail.com',
            'password' => bcrypt('password123')
        ]);

        User::create([
            'id' => 5,
            'role_id' => 5,
            'name' => 'Production',
            'email' => 'production@mail.com',
            'password' => bcrypt('password123')
        ]);
    }
}
