<?php

namespace Database\Seeders;

use App\Models\idea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            idea::factory()->count(40)->create();

    }
}
