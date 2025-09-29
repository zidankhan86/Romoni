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
    CustomPage::create([
        'title' => 'About Us',
        'slug' => 'about-us',
        'meta_title' => 'About Us - Learn More About Our Journey',
        'meta_description' => 'Discover who we are, our mission, and our commitment to delivering exceptional services and experiences to our valued customers.',
        'meta_keywords' => 'about us, company, mission, vision, team',
        'status' => 1,
        'body' => '<h2>Welcome to Our Company</h2>
                   <p>We are dedicated to making a difference by providing quality services and innovative solutions. Our mission is to bring value to our customers and create long-term relationships built on trust.</p>
                   <p>With a passionate team and years of experience, we strive to deliver excellence in everything we do. Thank you for being part of our journey.</p>',
    ]);
}
}
