<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Background;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure user is logged in
    }

    public function index()
    {
        $backgrounds = Background::all();
        return view('home', compact('backgrounds'));
    }

    public function completeSession(Request $request)
    {
        $user = auth()->user();
        $user->points += 10; // or however many points you want per session
        $user->save();

        return response()->json(['success' => true, 'points' => $user->points]);
    }

}

