<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class GetUser extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_get_user()
    {
        $user = User::find(1);

        $this->assertNotNull($user);
    }

    public function test_get_user_by_id()
    {
        $user = User::find(1);

        $this->assertEquals(1, $user->id);
    }
}
