<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->title(),
                'author' => $faker->name($i % 2 == 0 ? 'male' : 'female' ),
                'date' => $faker->date(),
                'content' => $faker->realText(250)
               
            ]);
    
        }
    }
}
