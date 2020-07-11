<?php

use Illuminate\Database\Seeder;

class GroupsInputsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GroupsInputs::class, 50)->create();
    }
}
