<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use App\Http\Livewire\IdeaIndex;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteIndexPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_page_contains_idea_index_livewire_component() {
        $user = User::factory()->create();
        
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);

        
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of my first idea',
        ]);

        $this
            ->get(route('idea.index'))
                ->assertSeeLivewire('idea-index'); 
    }


     /** @test */
     public function index_page_correctly_receives_votes_count() {
        $user = User::factory()->create();
        $userB = User::factory()->create();
        
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);

        
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of my first idea',
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userB->id,
            
        ]);

        $this->get(route('idea.index'))
                ->assertViewHas('ideas', function($ideas) {
                    return $ideas->first()->votes_count == 2;
                });
    }


    /** @test */
    public function votes_count_shows_correctly_on_index_page_livewire_component() {
        $user = User::factory()->create();
        
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);

        
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of my first idea',
        ]);
        
        Livewire::test(IdeaIndex::class, [
            'idea' => $idea,
            'votesCount' => 5, 
        ])
            ->assertSet('votesCount', 5);
    }


    /** @test */
    public function user_who_is_logged_in_shows_voted_if_idea_already_voted_for() {
        $user = User::factory()->create();
        
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open']);

        
        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of my first idea',
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
            
        ]);

        $response = $this->actingAs($user)->get(route('idea.index'));

        $ideaWithVotes = $response['ideas']->items()[0];
        
        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
                'idea' => $ideaWithVotes,
                'votesCount' => 5, 
            ]) 
            ->assertSet('hasVoted', true)
            ->assertSee('Voted');
    }
}