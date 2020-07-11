<?php

use Illuminate\Database\Seeder;

class InputsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Inputs::class, 30)->create();
    }
}
