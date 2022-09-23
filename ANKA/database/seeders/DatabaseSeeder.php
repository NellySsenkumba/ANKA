<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        \App\Models\User::factory()->create([
            'name' => 'Nelly',
            'email' => 'nelly@gmail.com',
            'password'=>hash('',"12345678")
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Nelson Ssenkumba',
            'email' => 'ssenkumbanelson.sn@gmail.com',
            'password'=>hash("","12345678"),
            'role'=>'1'
        ]);
    }
}
