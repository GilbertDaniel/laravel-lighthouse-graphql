<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = \Faker\Factory::create();
        $data = [];

        for ($i = 0; $i < 10000; $i++) {
            $data[] = [
                'name'              => $faker->name(),
                'email'             => $faker->unique()->safeEmail(),
                'title'             => $faker->jobTitle(),
            ];
        }

        $chunks = array_chunk($data, 5000);

        foreach ($chunks as $chunk) {
            Employee::insert($chunk);
        }
    }
}
