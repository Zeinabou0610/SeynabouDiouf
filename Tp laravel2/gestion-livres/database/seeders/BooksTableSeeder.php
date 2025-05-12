<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
    Book::factory(20)->create()->each(function($book) {
        $book->reviews()->saveMany(
            Review::factory(rand(1, 5))->make()
        );
    });
}
    }

