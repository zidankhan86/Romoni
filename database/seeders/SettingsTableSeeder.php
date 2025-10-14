<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'facebook_link'   => 'https://facebook.com/yourpage',
            'instagram_link'  => 'https://instagram.com/yourprofile',
            'youtube_link'    => 'https://youtube.com/yourchannel',
            'phone'           => '+8801700000000',
            'copyright_text'  => '© 2025 Priyoz. All rights reserved.',
            'top_var_text'    => 'Welcome to our beauty salon! Relax, refresh & renew.',
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);
    }
}
