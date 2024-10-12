<?php

namespace Database\Seeders;

use App\Models\Ministry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MinistryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ministry::create([
            'ministry_code' => 'm_admin',
            'ministry_name' => 'Admin',

        ]);
        Ministry::create([
            'ministry_code' => 'm_kids',
            'ministry_name' => 'Kids',

        ]);
        Ministry::create([
            'ministry_code' => 'm_music',
            'ministry_name' => 'Music',

        ]);
        Ministry::create([
            'ministry_code' => 'm_usher',
            'ministry_name' => 'Ushering',

        ]);
        Ministry::create([
            'ministry_code' => 'm_prayer',
            'ministry_name' => 'Prayer',

        ]);
        Ministry::create([
            'ministry_code' => 'm_tech',
            'ministry_name' => 'Technical',

        ]);
        Ministry::create([
            'ministry_code' => 'm_media',
            'ministry_name' => 'Multimedia',

        ]);

    }
}
