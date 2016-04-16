<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClinicsTableSeeder::class);
        $this->call(RolesTableSeeder::class);

        $this->call(UserTableSeeder::class);
    }
}


class ClinicsTableSeeder extends Seeder
{
    public function run()
    {
        $clinic = new \App\Clinic();
        $clinic->name = "Admin's Clinic";
        $clinic->address = "154, Nugegoda, Sri Lanka";
        $clinic->phone = "+94112365896";
        $clinic->email = "admin#example.com";
        $clinic->save();
    }
}


class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role = new \App\Role();
        $role->role = "Admin";
        $role->save();

        $role = new \App\Role();
        $role->role = "Doctor";
        $role->save();

        $role = new \App\Role();
        $role->role = "Nurse";
        $role->save();
    }
}


class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = new \App\User();
        $user->name = "Admin";
        $user->username = "admin";
        $user->email = "admin@example.com";
        $user->password = bcrypt('1234');

        $role=\App\Role::where('role','Admin')->first();
        $user->role()->associate($role);

        $clinic = \App\Clinic::first();
        $clinic->users()->save($user);
    }
}