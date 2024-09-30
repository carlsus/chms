<?php

namespace Database\Seeders;

use App\Models\Journey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JourneyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Journey::create([
            'journey_name' => 'One2One'
        ]);
        Journey::create([
            'journey_name' => 'Victory Weekend'
        ]);

        Journey::create([
            'journey_name' => 'E2E'
        ]);
    }
}
