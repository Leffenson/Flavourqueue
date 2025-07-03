<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Pass any necessary data to the view
        $cartCount = session('cart') ? count(session('cart')) : 0; // Example: Replace with actual cart count logic
        return view('menu', compact('cartCount'));
    }
}
