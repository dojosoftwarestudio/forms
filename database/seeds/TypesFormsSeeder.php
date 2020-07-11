<?php

use Illuminate\Database\Seeder;

class TypesFormsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TypesForms::class, 5)->create();
    }
}
