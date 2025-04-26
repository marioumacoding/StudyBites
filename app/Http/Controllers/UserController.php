<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Show the user profile
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    // Update user profile
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validation
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'background_id' => 'required|exists:backgrounds,id', // Validate background
        ]);

        // Update user data
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->background_id = $validatedData['background_id'];
        $user->save();

        return redirect()->route('user.profile', $user->id)->with('success', 'Profile updated successfully!');
    }

    // Update points after Pomodoro session
    public function updatePoints($id)
    {
        $user = User::findOrFail($id);

        // Update points (assuming each session gives 10 points)
        $user->points += 10; // You can adjust the points increment as needed
        $user->save();

        return response()->json(['message' => 'Points updated successfully!']);
    }

    public function updateBackground(Request $request)
    {
        $user = Auth::user();
        $user->background = $request->background;  // Store the selected background path
        $user->save();
    
        return response()->json(['success' => true]);
    }
    
}