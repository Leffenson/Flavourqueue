<!-- cart.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - FlavourQueue</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #FFBF00, #FFD966);
            color: #333;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 200%;
            font-family: "Bagel Fat One", cursive;
            background-color: #C9A642; /* Vendhayam color */
            color: white;
            padding: 20px;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .menu-container {
            position: absolute;
            left: 20px;
        }

        .menu-icon {
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
            color: white;
        }

        .header-right {
            position: absolute;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid white;
        }

        .cart-button {
            background-color: #8B6F20;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .cart-button:hover {
            background-color: #6F4E14;
            transform: scale(1.05);
        }

        .cart-container {
            max-width: 800px;
            margin: 20px auto;
            text-align: left;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
        }

        .cart-item .details {
            flex-grow: 1;
            padding: 0 20px;
        }

        .cart-total {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        .checkout-btn, .clear-cart-btn {
            background-color: #FFBF00;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .checkout-btn:hover, .clear-cart-btn:hover {
            background-color: #d99e00;
        }

        footer {
            background-color: #C9A642;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: space-around;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
        }

        footer a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #FFD966;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .modal input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal button {
            background-color: #FFBF00;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .modal button:hover {
            background-color: #d99e00;
        }

        .title-button {
    text-decoration: none;
    color: white;
    font-size: 200%;
    font-family: "Bagel Fat One", cursive;
    background: none;
    border: none;
    cursor: pointer;
    transition: color 0.3s ease;
}

.title-button:hover {
    color:rgb(241, 220, 154);
}
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="menu-container">
            <a href="{{ route('fqh') }}">
                <button class="menu-icon">☰</button>
            </a>
        </div>

        <!-- FlavourQueue Title as a Button -->
        <a href="{{ route('home') }}" class="title-button">
            FlavourQueue
        </a>

        <div class="header-right">
            <!-- Profile Icon -->
            <a href="/profile" class="profile-logo">
                <img src="/images/profile.jpg" alt="Profile">
            </a>

            <!-- View Cart Button -->
            <a href="{{ route('cart') }}">
                <button class="cart-button">
                    View Cart (<span id="cart-count">{{ $cartCount ?? 0 }}</span>)
                </button>
            </a>
        </div>
    </header>

    <!-- Main Section -->
    <main>
        <h1>Your Cart</h1>

        <div class="cart-container">
            @if(session('cart') && count(session('cart')) > 0)
                @foreach(session('cart') as $item)
                    <div class="cart-item">
                        <img src="{{ $item['image'] ?? '/images/default.jpg' }}" alt="{{ $item['name'] }}">
                        <div class="details">
                            <h3>{{ $item['name'] }}</h3>
                            <p>Price: ₹{{ $item['price'] }}</p>
                            <p>Quantity: {{ $item['quantity'] }}</p>
                        </div>
                    </div>
                @endforeach
                <p class="cart-total">Total: ₹{{ array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart'))) }}</p>
                <a href="#" class="checkout-btn">Proceed to Checkout</a>
                <button onclick="clearCart()" class="clear-cart-btn">Clear Cart</button>
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
    </main>

    <!-- Modal -->
    <div class="modal-overlay" id="modal-overlay"></div>
    <div class="modal" id="checkout-modal">
        <h2>Enter Delivery Details</h2>
        <form id="checkout-form" method="POST" action="{{ route('cart.checkout') }}">
            @csrf
            <input type="date" id="delivery-date" name="delivery_date" required>
            <input type="time" id="delivery-time" name="delivery_time" required>
            <button type="submit">Confirm</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('menu') }}">Menu</a>
    </footer>

    <script>
        function clearCart() {
            fetch('/cart/clear', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => location.reload());
        }

        // Show the modal
        document.querySelector('.checkout-btn').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('modal-overlay').style.display = 'block';
            document.getElementById('checkout-modal').style.display = 'block';
        });

        // Handle form submission
        document.getElementById('checkout-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const deliveryDate = document.getElementById('delivery-date').value;
            const deliveryTime = document.getElementById('delivery-time').value;

            const cartData = {
                items: @json(session('cart')), // Ensure this contains the cart items
                delivery_date: deliveryDate,
                delivery_time: deliveryTime,
                _token: '{{ csrf_token() }}'
            };

            fetch('{{ route('cart.checkout') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(cartData),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    window.location.href = '{{ route('home') }}';
                } else {
                    alert('Failed to place order. Please try again.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
