<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(['name' => 'AV']);
        Category::factory()->create(['name' => 'Chauffør']);
        Category::factory()->create(['name' => 'Crew']);
        Category::factory()->create(['name' => 'Lyd']);
        Category::factory()->create(['name' => 'Lys']);
        Category::factory()->create(['name' => 'Scene']);
    }
}