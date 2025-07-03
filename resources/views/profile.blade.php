
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Profile</h2>
    
    <!-- User Email -->
    <div class="mb-6">
        <label class="block text-gray-700 font-semibold">Email:</label>
        <div class="mt-1 p-2 border rounded bg-gray-100">{{ session('email') ?? (auth()->check() ? auth()->user()->email : 'Not available') }}</div>
    </div>

    <!-- Previous Orders -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold mb-2">Previous Orders</h3>
        @if(isset($orders) && count($orders) > 0)
            <ul class="space-y-4">
                @foreach($orders as $order)
                    <li class="border rounded p-4">
                        <div><strong>Order #{{ $order->id }}</strong> | Date: {{ $order->created_at->format('d M Y, H:i') }}</div>
                        <div>Total: ₹{{ $order->total_price }}</div>
                        <ul class="ml-4 mt-2 text-sm text-gray-700">
                            @foreach($order->items as $item)
                                <li>
                                    {{ $item->quantity }} x {{ $item->menuItem->name ?? 'Item removed' }} (₹{{ $item->price }})
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="text-gray-500">No previous orders found.</div>
        @endif
    </div>

    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 transition">Log Out</button>
    </form>
</div>
@endsection
