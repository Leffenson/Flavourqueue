<?php
// In your ProfileController or equivalent
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $orders = \App\Models\Order::with(['items.menuItem'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile', compact('orders'));
    }
}