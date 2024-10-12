<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

it('allows a user to log in with correct credentials', function () {
    // Create a user with known credentials
    $user = User::factory()->create([
        'email' => 'testuser@example.com',
        'password' => Hash::make('password123'), // Encrypt the password
    ]);

    // Simulate a POST request to the login route with valid credentials
    $response = $this->post('/login', [
        'email' => 'testuser@example.com',
        'password' => 'password123',
    ]);

    // Assert that the response is a redirect (successful login usually redirects)
    $response->assertStatus(302);

    // Assert that the user is authenticated
    $this->assertAuthenticatedAs($user);
});

it('denies access with incorrect credentials', function () {
    // Simulate a POST request to the login route with incorrect credentials
    $response = $this->post('/login', [
        'email' => 'testuser@example.com',
        'password' => 'wrongpassword', // Incorrect password
    ]);

    // Assert that the response is a redirect back to the login page
    $response->assertStatus(302);

    // Assert that the user is not authenticated
    $this->assertGuest();
});
