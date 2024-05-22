<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('projects')->insert([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'start_date' => $faker->date,
                'status' => $faker->randomElement(['planned', 'in progress', 'completed']),
                'user_id' => 2,
            ]);
        }
    }
}
