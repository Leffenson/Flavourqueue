<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlavorQueue - Indian Cuisine</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom,rgb(255, 255, 255),rgb(255, 255, 255));
            color: #333;
            position: relative;
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

        .container {
            padding: 40px 20px;
            text-align: center;
        }

        h1 {
            color:rgb(0, 0, 0);
            font-size: 36px;
            margin-bottom: 20px;
        }

        .category {
            margin: 40px 0;
        }

        .category h2 {
            font-size: 28px;
            color:rgb(1, 1, 1);
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.52);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .dish-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #FF6F61;
            margin-bottom: 10px;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 10px 0;
        }

        .quantity-selector button {
            background-color: #FFBF00;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .quantity-selector button:hover {
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
            color: #FFBF00;
        }

        .quantity-selector input {
            width: 40px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
        }

        .add-to-cart {
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

        .add-to-cart:hover {
            background-color: #6F4E14;
            transform: scale(1.05);
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

    <div class="container">
        <h1>Indian Cuisine</h1>

        <div class="category">
            <h2>Starters</h2>
            <div class="items">
                <div class="card">
                    <img src="/images/paneertikka.jpg" class="dish-img" alt="Paneer Tikka">
                    <p>Paneer Tikka</p>
                    <p class="price">₹250</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Paneer Tikka">
                        <input type="hidden" name="price" value="250">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/harabara.jpg" class="dish-img" alt="Hara Bhara Kebab">
                    <p>Hara Bhara Kebab</p>
                    <p class="price">₹220</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Hara Bhara Kebab">
                        <input type="hidden" name="price" value="220">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/alootikki.jpg" class="dish-img" alt="Aloo Tikki">
                    <p>Aloo Tikki</p>
                    <p class="price">₹180</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Aloo Tikki">
                        <input type="hidden" name="price" value="180">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/cheeseballs.jpg" class="dish-img" alt="Cheese Corn Balls">
                    <p>Cheese Corn Balls</p>
                    <p class="price">₹200</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Cheese Corn Balls">
                        <input type="hidden" name="price" value="200">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/springroll.jpg" class="dish-img" alt="Spring Rolls">
                    <p>Spring Rolls</p>
                    <p class="price">₹190</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Spring Rolls">
                        <input type="hidden" name="price" value="190">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/samosa.jpg" class="dish-img" alt="Samosa">
                    <p>Samosa</p>
                    <p class="price">₹150</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Samosa">
                        <input type="hidden" name="price" value="150">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/vegcutlet.jpg" class="dish-img" alt="Veg Cutlet">
                    <p>Veg Cutlet</p>
                    <p class="price">₹170</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Veg Cutlet">
                        <input type="hidden" name="price" value="170">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/mushtikka.jpg" class="dish-img" alt="Mushroom Tikka">
                    <p>Mushroom Tikka</p>
                    <p class="price">₹230</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Mushroom Tikka">
                        <input type="hidden" name="price" value="230">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/crispycorn.jpg" class="dish-img" alt="Crispy Corn">
                    <p>Crispy Corn</p>
                    <p class="price">₹210</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Crispy Corn">
                        <input type="hidden" name="price" value="210">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/gobi.jpg" class="dish-img" alt="Gobi Manchurian">
                    <p>Gobi Manchurian</p>
                    <p class="price">₹200</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Gobi Manchurian">
                        <input type="hidden" name="price" value="200">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/nachos.jpg" class="dish-img" alt="Loaded Nachos">
                    <p>Loaded Nachos</p>
                    <p class="price">₹169</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Loaded Nachos">
                        <input type="hidden" name="price" value="169">
                        <input type="hidden" name="image" value="/images/nachos.jpg"> <!-- Add the image path -->
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="cart-button">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="category">
            <h2>Gravy</h2>
            <div class="items">
                <div class="card">
                    <img src="/images/butter.jpg" class="dish-img" alt="Butter Chicken">
                    <p>Butter Chicken</p>
                    <p class="price">₹320</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Butter Chicken">
                        <input type="hidden" name="price" value="320">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/paneerbutter.jpg" class="dish-img" alt="Paneer Butter Masala">
                    <p>Paneer Butter Masala</p>
                    <p class="price">₹300</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Paneer Butter Masala">
                        <input type="hidden" name="price" value="300">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/mutton.jpg" class="dish-img" alt="Mutton Curry">
                    <p>Mutton Curry</p>
                    <p class="price">₹400</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Mutton Curry">
                        <input type="hidden" name="price" value="400">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/dal.jpg" class="dish-img" alt="Dal Makhani">
                    <p>Dal Makhani</p>
                    <p class="price">₹260</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Dal Makhani">
                        <input type="hidden" name="price" value="260">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/kadai.jpg" class="dish-img" alt="Kadai Paneer">
                    <p>Kadai Paneer</p>
                    <p class="price">₹280</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Kadai Paneer">
                        <input type="hidden" name="price" value="280">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/egg.jpg" class="dish-img" alt="Egg Curry">
                    <p>Egg Curry</p>
                    <p class="price">₹250</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Egg Curry">
                        <input type="hidden" name="price" value="250">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/prawncurry.jpg" class="dish-img" alt="Prawn Masala">
                    <p>Prawn Masala</p>
                    <p class="price">₹420</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Prawn Masala">
                        <input type="hidden" name="price" value="420">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/fishcurry.jpg" class="dish-img" alt="Fish Curry">
                    <p>Fish Curry</p>
                    <p class="price">₹380</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Fish Curry">
                        <input type="hidden" name="price" value="380">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/channa.jpg" class="dish-img" alt="Chana Masala">
                    <p>Chana Masala</p>
                    <p class="price">₹270</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Chana Masala">
                        <input type="hidden" name="price" value="270">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="category">
            <h2>Main Course</h2>
            <div class="items">
                <div class="card">
                    <img src="/images/chickenbiryani.jpg" class="dish-img" alt="Chicken Biryani">
                    <p>Chicken Biryani</p>
                    <p class="price">₹350</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Chicken Biryani">
                        <input type="hidden" name="price" value="350">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/muttonbiryani.jpg" class="dish-img" alt="Mutton Biryani">
                    <p>Mutton Biryani</p>
                    <p class="price">₹420</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Mutton Biryani">
                        <input type="hidden" name="price" value="420">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/fishbiryani.jpg" class="dish-img" alt="Fish Biryani">
                    <p>Fish Biryani</p>
                    <p class="price">₹400</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Fish Biryani">
                        <input type="hidden" name="price" value="400">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/prawnbiryani.jpg" class="dish-img" alt="Prawn Biryani">
                    <p>Prawn Biryani</p>
                    <p class="price">₹450</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Prawn Biryani">
                        <input type="hidden" name="price" value="450">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/egg_biryani.jpg" class="dish-img" alt="Egg Biryani">
                    <p>Egg Biryani</p>
                    <p class="price">₹300</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Egg Biryani">
                        <input type="hidden" name="price" value="300">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/jeera.jpg" class="dish-img" alt="Jeera Rice">
                    <p>Jeera Rice</p>
                    <p class="price">₹180</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Jeera Rice">
                        <input type="hidden" name="price" value="180">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/pulao.jpg" class="dish-img" alt="Veg Pulao">
                    <p>Veg Pulao</p>
                    <p class="price">₹250</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Veg Pulao">
                        <input type="hidden" name="price" value="250">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/khichdi.jpg" class="dish-img" alt="Dal Khichdi">
                    <p>Dal Khichdi</p>
                    <p class="price">₹220</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Dal Khichdi">
                        <input type="hidden" name="price" value="220">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/curd.jpg" class="dish-img" alt="Curd Rice">
                    <p>Curd Rice</p>
                    <p class="price">₹170</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Curd Rice">
                        <input type="hidden" name="price" value="170">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/ghee_rice.jpg" class="dish-img" alt="Ghee Rice">
                    <p>Ghee Rice</p>
                    <p class="price">₹190</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Ghee Rice">
                        <input type="hidden" name="price" value="190">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="category">
            <h2>Desserts</h2>
            <div class="items">
                <div class="card">
                    <img src="/images/jamun.jpg" class="dish-img" alt="Gulab Jamun">
                    <p>Gulab Jamun</p>
                    <p class="price">₹120</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Gulab Jamun">
                        <input type="hidden" name="price" value="120">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/rasmalai.jpg" class="dish-img" alt="Rasmalai">
                    <p>Rasmalai</p>
                    <p class="price">₹140</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Rasmalai">
                        <input type="hidden" name="price" value="140">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/jalebi.jpg" class="dish-img" alt="Jalebi">
                    <p>Jalebi</p>
                    <p class="price">₹100</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Jalebi">
                        <input type="hidden" name="price" value="100">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/phirni.jpg" class="dish-img" alt="Phirni">
                    <p>Phirni</p>
                    <p class="price">₹150</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Phirni">
                        <input type="hidden" name="price" value="150">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/kulfi.jpg" class="dish-img" alt="Kulfi">
                    <p>Kulfi</p>
                    <p class="price">₹130</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Kulfi">
                        <input type="hidden" name="price" value="130">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/rasgulla.jpg" class="dish-img" alt="Rasgulla">
                    <p>Rasgulla</p>
                    <p class="price">₹110</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Rasgulla">
                        <input type="hidden" name="price" value="110">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/soan.jpg" class="dish-img" alt="Soan Papdi">
                    <p>Soan Papdi</p>
                    <p class="price">₹90</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Soan Papdi">
                        <input type="hidden" name="price" value="90">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/mishti.jpg" class="dish-img" alt="Mishti Doi">
                    <p>Mishti Doi</p>
                    <p class="price">₹130</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Mishti Doi">
                        <input type="hidden" name="price" value="130">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/cham.jpg" class="dish-img" alt="Cham Cham">
                    <p>Cham Cham</p>
                    <p class="price">₹120</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Cham Cham">
                        <input type="hidden" name="price" value="120">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
                <div class="card">
                    <img src="/images/kaju.jpg" class="dish-img" alt="Kaju Katli">
                    <p>Kaju Katli</p>
                    <p class="price">₹160</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Kaju Katli">
                        <input type="hidden" name="price" value="160">
                        <div class="quantity-selector">
                            <button type="button" onclick="decreaseQuantity(this)">-</button>
                            <input type="number" name="quantity" value="0" min="0" class="quantity-input">
                            <button type="button" onclick="increaseQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('menu') }}">Menu</a>
    </footer>

    <script>
        function increaseQuantity(button) {
            const input = button.previousElementSibling;
            input.value = parseInt(input.value) + 1;
        }

        function decreaseQuantity(button) {
            const input = button.nextElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }

        function updateCartCount() {
            fetch("{{ route('cart.count') }}")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("cart-count").innerText = data.count;
                });
        }

        updateCartCount();

        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function(event) {
                event.preventDefault();
                let form = this.closest("form");
                let quantityInput = form.querySelector(".quantity-input");

                // Prevent adding to cart if quantity is 0
                if (parseInt(quantityInput.value) === 0) {
                    alert("Please select a quantity greater than 0.");
                    return;
                }

                let formData = new FormData(form);

                fetch(form.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartCount();
                    } else {
                        console.error("Error adding to cart:", data.message);
                    }
                }).catch(error => {
                    console.error("Fetch error:", error);
                });
            });
        });
    </script>
</body>
</html>
