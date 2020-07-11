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
        $this->call(TypesInputsSeeder::class);
        $this->call(InputsSeeder::class);
        $this->call(TypesFormsSeeder::class);
        $this->call(FormsSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(GroupsInputsSeeder::class);
        $this->call(FormsGroupsSeeder::class);

        $this->call(PersonsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersRolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(RolesPermissionsSeeder::class);

    }
}
