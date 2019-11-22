<?php

use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_have_10_users()
    {
        $this->assertEquals(10, User::count());
    }
}