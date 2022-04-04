<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found()
    {   
        $user = User::factory()->create([
            'name' => 'JohnDoe',
            'email' => 'fakefakefake@fakemail.com',
        ]);
        $gravatarURL = $user->getAvatar();

        $this->assertEquals(
            'https://www.gravatar.com/avatar/'
                    .md5($user->email)
                    .'?s=200'
                    .'&d=retro',
                    $gravatarURL
        );
    }
}