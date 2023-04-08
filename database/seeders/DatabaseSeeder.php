<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'full_name' => Str::random(10),
            'gender' => "M",
            'birth_of_date' => date('Y-m-d', strtotime('29-11-2000')),
            'place_of_date' => 'Tangerang',
            'religion' => "Islam",
            'active' => 1,
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => date('Y-m-d'),
        ]);
    }
}
