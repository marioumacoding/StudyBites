<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Background;
use App\Models\Quote;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure user is logged in
    }
    
   public function index()
{
    $backgrounds = Background::all();

    // Static array of quotes (you can add more or pull from another source if needed)
    $quotes = [
        ['text' => 'The only way to do great work is to love what you do.', 'author' => 'Steve Jobs'],
        ['text' => 'Success is not final, failure is not fatal: It is the courage to continue that counts.', 'author' => 'Winston Churchill'],
        ['text' => 'It does not matter how slowly you go as long as you do not stop.', 'author' => 'Confucius'],
        // Add more quotes as needed
    ];

    return view('home', compact('backgrounds', 'quotes'));
}

    

    public function completeSession(Request $request): JsonResponse
    {
        $user = auth()->user();
        $user->points += 10; // or however many points you want per session
        $user->save();

        return response()->json(['success' => true, 'points' => $user->points]);
    }

    public function updateBackground(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'background' => 'required|string'
        ]);

        $user = Auth::user();
        $user->background = $validated['background'];
        $user->save();

        return response()->json(['success' => true, 'newBackground' => $validated['background']]);
    }
}