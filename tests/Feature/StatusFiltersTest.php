<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Livewire\StatusFilters;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusFiltersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_page_contains_status_filters_livewire_component() {
        $user = User::factory()->create();
        
        $category = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);
        
        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of my first idea',
        ]);

        $this->get(route('idea.index'))
            ->assertSeeLivewire('status-filters');
    }


    /** @test */
    public function show_page_contains_status_filters_livewire_component() {
        $user = User::factory()->create();
        
        $category = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);
        
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of my first idea',
        ]);

        $this->get(route('idea.show', $idea))
            ->assertSeeLivewire('status-filters');
    }


     /** @test */
     public function shows_correct_status_count() {
        $user = User::factory()->create();
        
        $category = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['id' => 4, 'name' => 'Implemented']);
        
        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'category_id' => $category->id,
            'status_id' => $status->id,
            'description' => 'Description of my first idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'category_id' => $category->id,
            'status_id' => $status->id,
            'description' => 'Description of my first idea',
        ]);

        Livewire::test(StatusFilters::class)
            ->assertSee('All Ideas (2)')
            ->assertSee('Implemented (2)');
    }


    /** @test */
    public function filtering_works_when_query_string_in_place() {
        $user = User::factory()->create();
        
        $category = Category::factory()->create(['name' => 'Category 1']);
        
        $statuses = [
            'Considering' => 2,
            'In Progress' => 3,
        ];
        
        foreach ($statuses as $status => $count) {
            Idea::factory()
                ->for($user)
                ->for($category)
                ->forStatus(['name' => $status])
                ->count($count)
                ->create();
        }
        
        $response = $this->get(route('idea.index', ['status.name' => 'In Progress']));
        $response->assertSuccessful();
        $response->assertSee('>In Progress</div>', false);
        $response->assertDontSee('>In Progress</div>', true);
    }
}
