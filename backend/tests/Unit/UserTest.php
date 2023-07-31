<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_user_can_have_path(): void
    {
        $user = User::factory()->create();

        $this->assertEquals('/api/users/' . $user->id, $user->path());
    }
}
