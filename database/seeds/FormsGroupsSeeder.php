<?php

use Illuminate\Database\Seeder;

class FormsGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FormsGroups::class, 50)->create();
    }
}
