<?php

namespace Database\Seeders;

use App\Models\Idea;
use App\Models\User;
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
        User::factory(20)->create();

        $this->call([
           CategorySeeder::class,
           StatusSeeder::class,
           IdeaSeeder::class,
           PermissionsSeeder::class,
        ]);  
    }
}