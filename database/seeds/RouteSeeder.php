<?php

use Illuminate\Database\Seeder;
use App\Routes;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Routes::class, 75)->create();
    }
}