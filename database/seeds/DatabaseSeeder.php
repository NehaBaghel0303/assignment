<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'Neha Baghel',
                'email' => 'neha@test.com',
                'email_verified_at' => now(),
                'phone_number' => 1234567890,
                'dob' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        factory(App\User::class,20)->create();
    }
}
