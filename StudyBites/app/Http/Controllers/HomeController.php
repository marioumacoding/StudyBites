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
}

