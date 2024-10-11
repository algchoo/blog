<form action="/todo" method="POST">
    @csrf
    <input type="text" name="title" placeholder="New Todo">
    <input type="text" name="description" placeholder="Description">
    <button type="submit">Add Todo</button>
</form>

<ul>
    @foreach ($todos as $todo)
        <li>
            {{ $todo->title }} - {{ $todo->description }}
            <form action="/todo/{{ $todo->id }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="checkbox" name="is_complete" {{ $todo->is_complete ? 'checked' : '' }}>
                <button type="submit">Update</button>
            </form>
            <form action="/todo/{{ $todo->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
