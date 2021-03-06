<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_redirect_succesfully()
    {
        //Create a user
        $users = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        // action
        $response = $this->post('/login', ['email' => 'admin@admin.com', 'password' => 'password']);

        // assert
        $response->assertStatus(302);
        $response->assertRedirect('/home');

        // Post to /login

        $response = $this->get('/login');

        // Assert redirect 302 to /home
        $response->assertStatus(302);
    }

    public function test_authenticated_user_can_access_books_table()
    {
        //Create a user
        $user = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        // Login as user
        $response = $this->actingAs($user)->get('/user/books');
        $response->assertStatus(200);
    }

    public function test_authenticated_user_cannot_access_books_table()
    {
        // Login as user
        $response = $this->get('/user/books');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
