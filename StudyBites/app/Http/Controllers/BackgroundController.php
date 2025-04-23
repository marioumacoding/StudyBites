<?php

namespace App\Http\Controllers;

use App\Models\Background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackgroundController extends Controller
{
    // Show a list of all available backgrounds
    public function index()
    {
        $backgrounds = Background::all(); // Retrieve all backgrounds
        return view('backgrounds.index', compact('backgrounds'));
    }

    // Update user's background selection by name
    public function update(Request $request)
    {
        $request->validate([
            'background_name' => 'required|exists:backgrounds,image_name', // Validate background name
        ]);

        // Find the background by name
        $background = Background::where('image_name', $request->background_name)->first();

        if ($background) {
            // Update the background_id for the authenticated user
            $user = Auth::user();
            $user->background_id = $background->id;
            $user->save();

            return redirect()->back()->with('success', 'Background updated successfully!');
        }

        return redirect()->back()->with('error', 'Background not found.');
    }
}
