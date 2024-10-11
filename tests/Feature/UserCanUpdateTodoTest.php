<?php

use App\Models\User;
use App\Models\Todo;

it('allows a user to mark a todo as complete', function () {
    // Simulate an authenticated user
    $user = User::factory()->create();
    
    // Create a todo with `is_complete` as false
    $todo = Todo::factory()->create(['user_id' => $user->id, 'is_complete' => false]);

    // Act: Send a PATCH request to update the todo's completion status
    $response = $this->actingAs($user)->patch("/todo/{$todo->id}", [
        'is_complete' => true,
    ]);

    // Assert: Check that the todo was updated
    $response->assertStatus(302);  // Check for a redirect response
    expect($todo->fresh()->is_complete)->toBe(1);  // Verify the value was updated
});
