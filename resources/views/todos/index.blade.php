@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Form to add a new todo -->
    <form action="/todo" method="POST">
        @csrf
        <input type="text" name="title" placeholder="New Todo" class="form-input">
        <input type="text" name="description" placeholder="Description" class="form-input">
        <button type="submit" class="btn btn-primary">Add Todo</button>
    </form>

    <!-- List of todos -->
    <ul class="todo-list">
        @foreach ($todos as $todo)
            <li class="{{ $todo->is_complete ? 'complete' : 'incomplete' }}">
                <div class="todo-content">
                    <span class="todo-title">{{ $todo->title }}</span> - 
                    <span class="todo-description">{{ $todo->description }}</span>
                </div>

                <div class="todo-actions">
                    <!-- Form to update todo (mark complete/incomplete) -->
                    <form action="/todo/{{ $todo->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="is_complete" value="0">
                        <input type="checkbox" name="is_complete" value="1" {{ $todo->is_complete ? 'checked' : '' }}>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                    <!-- Form to delete todo -->
                    <form action="/todo/{{ $todo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn delete">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
