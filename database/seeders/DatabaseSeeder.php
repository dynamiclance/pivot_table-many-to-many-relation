<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        \App\Models\User::factory(10)->create();

        $roles = ['user', 'admin', 'writer'];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        foreach(User::all() as $user) {
            foreach(Role::all() as $role) {
                $user->roles()->attach($role->id);
            }
        }
    }
}
