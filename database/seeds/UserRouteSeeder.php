<?php

use Illuminate\Database\Seeder;

class UserRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserRoutes::class, 400)->create();

       
            
        
    }
}
