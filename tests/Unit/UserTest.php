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


    /** @test */
    public function can_check_if_user_is_an_admin() {
        $user = User::factory()->make([
            'name' => 'Mickey Berg',
            'email' => 'mickeybrasmussen@gmail.com',
        ]);

        $userB = User::factory()->make([
            'name' => 'JohnDoe',
            'email' => 'user@user.com',
        ]);

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($userB->isAdmin());
    }
}