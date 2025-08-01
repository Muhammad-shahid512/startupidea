<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdeaCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $categories = [
            ['name' => 'Artificial Intelligence'],
            ['name' => 'Machine Learning'],
            ['name' => 'Web Development'],
            ['name' => 'Mobile App Development'],
            ['name' => 'Ecommerce & Online Stores'],
            ['name' => 'EdTech'],
            ['name' => 'FinTech'],
            ['name' => 'HealthTech & MedTech'],
            ['name' => 'SaaS'],
            ['name' => 'Social Media & Community Platforms'],
            ['name' => 'Blockchain & Crypto'],
            ['name' => 'AR/VR'],
            ['name' => 'GreenTech & Sustainability'],
            ['name' => 'Logistics & Supply Chain'],
            ['name' => 'Gaming & Esports'],
            ['name' => 'FoodTech & AgriTech'],
            ['name' => 'Travel & Tourism Tech'],
            ['name' => 'Marketing & Advertising Tech'],
            ['name' => 'Productivity & Collaboration Tools'],
            ['name' => 'Security & Cybersecurity'],
            ['name' => 'Real Estate Tech'],
            ['name' => 'IoT'],
        ];

        DB::table('ideacategories')->insert($categories);
    }
}
