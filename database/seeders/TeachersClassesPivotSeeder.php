<?php

namespace Database\Seeders;

use App\Models\TeachersClasses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachersClassesPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeachersClasses::factory()->count(10)->create();
    }
}
