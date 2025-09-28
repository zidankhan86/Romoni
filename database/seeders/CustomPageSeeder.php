<?php

namespace Database\Seeders;

use App\Models\CustomPage;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            CustomPage::create([
                'title' => $title = fake()->sentence(3),
                'slug' => Str::slug($title),
                'meta_title' => fake()->sentence(5),
                'meta_description' => fake()->paragraph(2),
                'meta_keywords' => implode(', ', fake()->words(5)),
                'status' => fake()->boolean ? 1 : 0,
                'body' => fake()->paragraphs(3, true),
            ]);
        }

    }
}
