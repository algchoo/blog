<?php

use App\Models\User;
use App\Models\Todo;

it('allows a user to delete a todo', function () {
    // Simulate an authenticated user
    $user = User::factory()->create();
    
    // Create a todo for the user
    $todo = Todo::factory()->create(['user_id' => $user->id]);

    // Act: Send a DELETE request to delete the todo
    $response = $this->actingAs($user)->delete("/todo/{$todo->id}");

    // Assert: Check that the todo was deleted
    $response->assertStatus(302);  // Check for a redirect response
    $this->assertDatabaseMissing('todos', ['id' => $todo->id]);  // Verify it no longer exists
});
