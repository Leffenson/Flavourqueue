<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Pass any necessary data to the view
        $cartCount = 0; // Example: Replace with actual cart count logic
        return view('home', compact('cartCount'));
    }
}
