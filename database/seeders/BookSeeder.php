<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Book;
Use Illuminate\Support\Facades\Hash;

Use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "author" => "New Author",
                "title" => "The Demon's Night Out",
                "description" => "As you're roaming out in the streets at the dead of night some demons capture you and trap you in a lair...",
                "price" => "125",
                "quantity" => "75",
            ],
            [
                "author" => "Stephen",
                "title" => "Prison Escape",
                "description" => "Whilst you're sleeping, you are captured by some fake police officers...",
                "price" => "175",
                "quantity" => "125",
            ]
        ];

        Book::insert($data);

        $faker = Faker::create();

        for($i = 0; $i < 3; $i++)
        {
            Book::create([
                "author" => $faker->name,
                "title" => $faker->name,
                "description" => $faker->regexify('Random description.'),
                "price" => $faker->numberBetween($min = 125, $max = 550),
                "quantity" => $faker->numberBetween($min = 0, $max = 500),
            ]);
        }
    }
}
