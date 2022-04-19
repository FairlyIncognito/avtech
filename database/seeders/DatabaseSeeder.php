<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'MickeyBerg',
            'email' => 'mickeybrasmussen@gmail.com',
            'password' => Hash::make('30555944twr')
        ]);

        User::factory(19)->create();

        Category::factory()->create(['name' => 'AV']);
        Category::factory()->create(['name' => 'Chauffør']);
        Category::factory()->create(['name' => 'Crew']);
        Category::factory()->create(['name' => 'Lyd']);
        Category::factory()->create(['name' => 'Lys']);
        Category::factory()->create(['name' => 'Scene']);

        Status::factory()->create(['name' => 'Åben']);
        Status::factory()->create(['name' => 'Overvejer']);
        Status::factory()->create(['name' => 'Igangværende']);
        Status::factory()->create(['name' => 'Implementeret']);
        Status::factory()->create(['name' => 'Lukket']);

        Idea::factory(100)->existing()->create();

        // Generate unique votes. Ensure idea_id and user_id are unique for each row.
        foreach(range(1, 20) as $user_id) {
            foreach(range(1, 100) as $idea_id) {
                if($idea_id % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id
                    ]);
                }
            }
        }
    }
}