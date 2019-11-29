<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create();

        App\User::create([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => Hash::make('admin'), // password
        'remember_token' => Str::random(10),
        'admin' => true
        ]);
            
        
    }
}
