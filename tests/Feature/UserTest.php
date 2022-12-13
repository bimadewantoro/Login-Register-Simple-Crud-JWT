<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_login()
    {
        $user = factory(User::class)->create();
    }
}
