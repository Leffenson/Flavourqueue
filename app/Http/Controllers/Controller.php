<?php


namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function showMenu()
    {
        $cartCount = Session::get('cart', collect())->sum('quantity');
        return view('your-view-file', compact('cartCount'));
    }
}

