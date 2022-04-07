<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_count_of_each_status() {
        $user = User::factory()->create();
        
        $category = Category::factory()->create(['name' => 'Category 1']);

        $statuses = [
            'Open' => 6,
            'Considering' => 4,
            'In Progress' => 5,
            'Implemented' => 2,
            'Closed' => 3
        ];
        
        foreach ($statuses as $status => $count) {
            Idea::factory()
                ->for($user)
                ->for($category)
                ->forStatus(['name' => $status])
                ->count($count)
                ->create();
        
            $this->assertEquals($count, Status::getCount()[Str::snake($status)]);
        }
        
        $this->assertEquals(array_sum($statuses), Status::getCount()['all_statuses']);    
    }
}
