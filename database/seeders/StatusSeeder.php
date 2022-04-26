<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::factory()->create(['name' => 'Åben']);
        Status::factory()->create(['name' => 'Overvejer']);
        Status::factory()->create(['name' => 'Igangværende']);
        Status::factory()->create(['name' => 'Implementeret']);
        Status::factory()->create(['name' => 'Lukket']);
    }
}