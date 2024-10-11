<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        auth()->user()->todos()->create($request->all());
    
        return redirect()->back();
    }
    
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'is_complete' => 'required|boolean',
        ]);
    
        $todo->update([
            'is_complete' => $request->input('is_complete', false),
        ]);
    
        return redirect()->back();
    }
    
    public function destroy(Todo $todo)
    {
        $todo->delete();
    
        return redirect()->back();
    }    
}
