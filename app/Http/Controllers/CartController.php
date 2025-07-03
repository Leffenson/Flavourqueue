<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // Example data for the cart item
        $item = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'image' => $request->input('image', '/images/default.jpg'), // Default image if none is provided
        ];

        // Add the item to the cart session
        $cart = session()->get('cart', []);
        $cart[] = $item;
        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Item added to cart']);
    }

    public function getCartCount()
    {
        $cartCount = session('cart') ? count(session('cart')) : 0;
        return response()->json(['count' => $cartCount]);
    }

    public function checkout(Request $request)
    {
        dd($request->all()); // Debugging
        try {
            // Debug incoming request data
            \Log::info('Checkout Request Data:', $request->all());

            $request->validate([
                'delivery_date' => 'required|date',
                'delivery_time' => 'required',
                'items' => 'required|array',
            ]);

            // Debug validated data
            \Log::info('Validated Data:', $request->all());

            // Calculate total price
            $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $request->items));

            // Save the order details
            $order = \App\Models\Order::create([
                'user_id' => auth()->id(), // <-- add this line
                'delivery_date' => $request->delivery_date,
                'delivery_time' => $request->delivery_time,
                'total_price' => $totalPrice,
            ]);

            // Debug order creation
            \Log::info('Order Created:', $order->toArray());

            // Save the order items
            foreach ($request->items as $item) {
                \App\Models\OrderItem::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // Clear the cart session
            Session::forget('cart');

            return response()->json(['success' => true, 'message' => 'Items ordered successfully!']);
        } catch (\Exception $e) {
            // Log the exception
            \Log::error('Checkout Error:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            return response()->json(['success' => false, 'message' => 'An error occurred during checkout.'], 500);
        }
    }
}
