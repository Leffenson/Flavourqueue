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
            background: linear-gradient(to bottom, rgb(255, 255, 255), rgb(255, 255, 255));
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
            color: #FFD966;
        }

        main {
            background-color: white;
            padding: 40px 20px;
            text-align: center;
        }

        .cuisines {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
            text-decoration: none; /* Remove underline */
            color: inherit; /* Inherit text color */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .card h3 {
            font-size: 24px;
            color: #FF6F61;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>
    <header>

        <!-- FlavourQueue Title as a Button -->
        <a href="{{ route('home') }}" class="title-button">
            FlavourQueue
        </a>

        <div class="header-right">
            <!-- Profile Icon -->
            <a href="/profile" class="profile-logo">
                <img src="/images/profile.jpg" alt="Profile">
            </a>
        </div>
    </header>

    <main>
        <h1>Explore Our Cuisines</h1>
        <div class="cuisines">
            <!-- Cuisine Card 1 -->
            <a href="{{ route('ind') }}" class="card">
                <img src="/images/indian.jpg" alt="Indian Cuisine">
                <h3>Indian Cuisine</h3>
                <p>Experience the rich and diverse flavors of India with our authentic dishes.</p>
            </a>

            <!-- Cuisine Card 2 -->
            <a href="{{ route('italian') }}" class="card">
                <img src="/images/italian.jpg" alt="Italian Cuisine">
                <h3>Italian Cuisine</h3>
                <p>Indulge in the classic tastes of Italy with our handcrafted pastas and pizzas.</p>
            </a>

            <!-- Cuisine Card 3 -->
            <a href="{{ route('chinese') }}" class="card">
                <img src="/images/chinese.jpg" alt="Chinese Cuisine">
                <h3>Chinese Cuisine</h3>
                <p>Savor the bold and vibrant flavors of China with our delicious offerings.</p>
            </a>
        </div>
    </main>

    <footer>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('menu') }}">Menu</a>
    </footer>
</body>
</html>
