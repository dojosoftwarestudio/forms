<?php

use Illuminate\Database\Seeder;

class TypesInputsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TypesInputs::class, 10)->create();
    }
}
