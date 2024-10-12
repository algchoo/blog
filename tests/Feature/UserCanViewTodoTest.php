<?php

use App\Models\User;
use App\Models\Todo;

it('allows a user to view their todos', function () {
    // Simulate an authenticated user
    $user = User::factory()->create();
    
    // Create a todo for the user
    $todo = Todo::factory()->create(['user_id' => $user->id]);

    // Act: Send a GET request to view the todos
    $response = $this->actingAs($user)->get('/', ['_token' => csrf_token()]);

    // Assert: Check that the todo appears in the response
    $response->assertSee($todo->title);
});
