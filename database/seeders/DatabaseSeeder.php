<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('posts')->insert([
                'title' => $faker->text(20),
                'descriptions' => $faker->text(400),
            ]);
        }
    }
}
