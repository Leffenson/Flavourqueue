<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlavourQueue</title>
    <link href="https://fonts.googleapis.com/css2?family=Bagel+Fat+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/images/bg.img');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* 60% transparency */
            z-index: -1;
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

        main {
            padding: 40px 20px;
            text-align: center;
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

        /* FQ's Specials Section */
        .fq-specials {
            padding: 40px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            max-width: 1200px;
        }

        .fq-specials h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #FFBF00;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .specials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 0 auto;
        }

        .specials-grid .card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .specials-grid .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .specials-grid .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .specials-grid .card .info {
            padding: 15px;
        }

        .specials-grid .card .info h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        .specials-grid .card .info p {
            margin-bottom: 5px;
            color: #666;
            font-size: 14px;
        }

        .specials-grid .card .info .price {
            font-size: 18px;
            font-weight: bold;
            color: #ff6f61;
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

        .quantity-selector input {
            width: 40px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
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

    <main>
        <!-- FQ's Specials Section -->
        <section class="fq-specials" style="background-image: url('C:\Users\leffe\flavourqueue\public\images\bg')">
            <h2>FQ's Specials</h2>
            <div class="specials-grid">
                <!-- Dish 1 -->
                <div class="card">
                    <img src="/images/cheese.jpg" alt="Burger">
                    <div class="info">
                        <h3>Cheesy Burger</h3>
                        <p>Loaded with double cheese and crispy patties.</p>
                        <p class="price">₹149</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Cheesy Burger">
    <input type="hidden" name="price" value="149">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 2 -->
                <div class="card" >
                    <img src="/images/pizza.jpg" alt="Pizza">
                    <div class="info">
                        <h3>Margherita Pizza</h3>
                        <p>Classic pizza topped with fresh mozzarella and basil.</p>
                        <p class="price">₹299</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Margherita Pizza">
    <input type="hidden" name="price" value="299">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 3 -->
                <div class="card">
                    <img src="/images/pasta.jpg" alt="Pasta">
                    <div class="info">
                        <h3>Garlic Butter Pasta</h3>
                        <p>Perfectly creamy and loaded with fresh garlic flavor.</p>
                        <p class="price">₹199</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Garlic Butter Pasta">
    <input type="hidden" name="price" value="199">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 4 -->
                <div class="card">
                    <img src="/images/fries.jpg" alt="Fries">
                    <div class="info">
                        <h3>Loaded Fries</h3>
                        <p>Fries topped with melted cheese and jalapeños.</p>
                        <p class="price">₹129</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Loaded Fries">
    <input type="hidden" name="price" value="129">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 5 -->
                <div class="card">
                    <img src="/images/tacos.jpg" alt="Tacos">
                    <div class="info">
                        <h3>Spicy Tacos</h3>
                        <p>Filled with flavorful chicken and salsa.</p>
                        <p class="price">₹179</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Spicy Tacos">
    <input type="hidden" name="price" value="179">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 6 -->
                <div class="card">
                    <img src="/images/sandwich.jpg" alt="Sandwich">
                    <div class="info">
                        <h3>Club Sandwich</h3>
                        <p>A delicious multi-layered sandwich.</p>
                        <p class="price">₹149</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Club Sandwich">
    <input type="hidden" name="price" value="149">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 7 -->
                <div class="card">
                    <img src="/images/biryani.jpg" alt="Biryani">
                    <div class="info">
                        <h3>Chicken Biryani</h3>
                        <p>Fragrant basmati rice with flavorful chicken.</p>
                        <p class="price">₹249</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Chicken Biryani">
    <input type="hidden" name="price" value="249">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 8 -->
                <div class="card">
                    <img src="/images/momos.jpg" alt="Dumplings">
                    <div class="info">
                        <h3>Steamed Dumplings</h3>
                        <p>Delicate dumplings filled with veggies and meat.</p>
                        <p class="price">₹99</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Steamed Dumplings">
    <input type="hidden" name="price" value="99">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 9 -->
                <div class="card">
                    <img src="/images/nachos.jpg" alt="Nachos">
                    <div class="info">
                        <h3>Loaded Nachos</h3>
                        <p>Crispy nachos with cheese, beans, and jalapeños.</p>
                        <p class="price">₹169</p>
                        <!-- Quantity Selector -->
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

                <!-- Dish 10 -->
                <div class="card">
                    <img src="/images/brownie.jpg" alt="Brownie">
                    <div class="info">
                        <h3>Chocolate Brownie</h3>
                        <p>Decadent chocolate brownie with a gooey center.</p>
                        <p class="price">₹79</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Chocolate Brownie">
    <input type="hidden" name="price" value="79">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 11 -->
                <div class="card">
                    <img src="/images/smoothie.jpg" alt="Smoothie">
                    <div class="info">
                        <h3>Berry Smoothie</h3>
                        <p>Refreshing smoothie made with mixed berries.</p>
                        <p class="price">₹129</p>
                        <!-- Quantity Selector -->
                        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Berry Smoothie">
    <input type="hidden" name="price" value="129">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
                    </div>
                </div>

                <!-- Dish 12 -->
                <div class="card">
    <img src="/images/nachos.jpg" alt="Nachos">
    <div class="info">
        <h3>Loaded Nachos</h3>
        <p>Crispy nachos with cheese, beans, and jalapeños.</p>
        <p class="price">₹169</p>
        <!-- Quantity Selector -->
        <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="Loaded Nachos">
    <input type="hidden" name="price" value="169">
    <div class="quantity-selector">
        <button type="button" onclick="decreaseQuantity(this)">-</button>
        <input type="number" name="quantity" value="0" min="0" class="quantity-input">
        <button type="button" onclick="increaseQuantity(this)">+</button>
    </div>
    <button type="submit" class="cart-button">Add to Cart</button>
</form>
    </div>
</div>
            </div>
        </section>
    </main>

    <footer>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('menu') }}">Menu</a>
    </footer>

    <script>
    function toggleMenu() {
        var menu = document.getElementById("menuDropdown");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }

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

