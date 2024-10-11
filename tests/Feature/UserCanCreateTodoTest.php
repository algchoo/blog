<?php

use App\Models\User;
use App\Models\Todo;

it('allows a user to create a todo', function () {
    // Simulate an authenticated user
    $user = User::factory()->create();

    // Act: Send a POST request to create a todo
    $response = $this->actingAs($user)->post('/todo', [
        'title' => 'Test Todo',
        'description' => 'A description for the test todo',
        'is_complete' => false,
    ]);

    // Assert: Check that the todo was successfully created
    $response->assertStatus(302);  // Check that the response was a redirect
    $this->assertDatabaseHas('todos', [
        'title' => 'Test Todo',
        'description' => 'A description for the test todo',
    ]);
});
