<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    //use RefreshDatabase;

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Tes23tUser',
            'email' => 'test23@example.com',
            'password' => 'ewfwefeffewfewfwef',
            'password_confirmation' => 'ewfwefeffewfewfwef',
        ]);

        $this->assertAuthenticated();
        $response->assertNoContent();
    }
}
