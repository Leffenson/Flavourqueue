<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #000000, #550000);
            overflow: hidden;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Login Container */
        .login-container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(255, 0, 0, 0.7);
            max-width: 400px;
            width: 100%;
            text-align: center;
            z-index: 10; /* Ensures login container stays above nodes */
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            outline: none;
        }

        button {
            background: #ff0000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background: #aa0000;
        }

        /* Floating Nodes */
        .floating-node {
            position: absolute;
            width: 5px; /* Smaller size */
            height: 5px; /* Smaller size */
            background: #fff;
            border-radius: 50%;
            opacity: 0.8;
            animation: float infinite;
            box-shadow: 0 0 5px #fff, 0 0 10px #ff0000, 0 0 15px #ff0000; /* Shiny effect */
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
                opacity: 0.8;
            }
            50% {
                transform: translateY(-30px); /* Slightly higher movement */
                opacity: 1;
            }
            100% {
                transform: translateY(0px);
                opacity: 0.8;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
            }

            input {
                width: 100%;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login with Mobile Number</h1>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Mobile Number Form -->
        <form action="{{ route('login.sendOtp') }}" method="POST">
            @csrf
            <label for="mobile">Enter Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" placeholder="10-digit mobile number" required>
            <button type="submit">Send OTP</button>
        </form>

        <!-- OTP Verification Form -->
        <form action="{{ route('login.verifyOtp') }}" method="POST">
            @csrf
            <label for="otp">Enter OTP:</label>
            <input type="text" id="otp" name="otp" placeholder="6-digit OTP" required>
            <button type="submit">Verify OTP</button>
        </form>
    </div>

    <!-- Nodes -->
    <script>
        // Create 100 floating nodes outside the login container
        for (let i = 0; i < 100; i++) {
            const node = document.createElement('div');
            node.classList.add('floating-node');
            node.style.left = `${Math.random() * 100}vw`;  // Randomize horizontal position
            node.style.top = `${Math.random() * 100}vh`;   // Randomize vertical position
            node.style.animationDuration = `${2 + Math.random() * 3}s`;  // Randomize animation speed
            document.body.appendChild(node);
        }
    </script>
</body>
</html>
