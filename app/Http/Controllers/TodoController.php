<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Auth::user()->todos()->orderBy('created_at', 'desc')->get();
        return response()->json($todos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $todo = Auth::user()->todos()->create([
            'description' => $request->description,
            'completed' => false
        ]);

        return response()->json($todo, 201);
    }


    // public function update(Request $request, $id)
    // {
    //     // Validate incoming data (optional but recommended)
    //     $request->validate([
    //         'description' => 'required|string|max:255',
    //     ]);
    
    //     // Find the Todo item by its ID
    //     $todo = Todo::find($id);
    
    //     if (!$todo) {
    //         return response()->json(['error' => 'Todo not found'], 404);
    //     }
    
    //     // Update the task description
    //     $todo->description = $request->input('description');
    //     $todo->completed = $request->input('completed', $todo->completed); // Optional, only if you're updating the 'completed' status
    //     $todo->save();
    
    //     // Return the updated todo as a JSON response
    //     return response()->json($todo);
    // }
    public function update(Request $request, $id)
{
    // Validate incoming data (optional but recommended)
    $request->validate([
        'description' => 'required|string|max:255',
        'completed' => 'required|boolean', // Ensure completed is a boolean value
    ]);

    // Find the Todo item by its ID
    $todo = Todo::find($id);

    if (!$todo) {
        return response()->json(['error' => 'Todo not found'], 404);
    }

    // Update the task description and completed status
    $todo->description = $request->input('description');
    $todo->completed = $request->input('completed'); // 1 for checked, 0 for unchecked
    $todo->save();

    // Return the updated todo as a JSON response
    return response()->json($todo);
}


    public function destroy(Todo $todo)
{
    $todo->delete();

    return response()->json(null, 204);
}

    public function history()
    {
        $todos = auth()->user()->todos()->orderBy('created_at', 'desc')->get();
        return view('todos.history', compact('todos'));
    }
    
}