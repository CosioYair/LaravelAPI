<?php

use Illuminate\Database\Seeder;

class WeddingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Wedding::class, 10)->create();
    }
}
