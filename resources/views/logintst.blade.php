<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FlavourQueue</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-yellow-400 to-red-500 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-center text-gray-800">Welcome to FlavourQueue</h2>
        <div class="mt-6 flex justify-around">
            <button id="customerTab" class="text-lg font-semibold text-gray-600 border-b-4 border-transparent hover:border-yellow-500 focus:border-yellow-500 p-2">Customer Login</button>
            <button id="employeeTab" class="text-lg font-semibold text-gray-600 border-b-4 border-transparent hover:border-red-500 focus:border-red-500 p-2">Employee Login</button>
        </div>
        
        <!-- Customer Login -->
        <div id="customerLogin" class="mt-6">
            <label class="block text-gray-700">Email</label>
            <input type="email" id="customerEmail" class="w-full p-2 border rounded mt-1" placeholder="Enter your email" required>
            <button onclick="sendOTP()" class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded w-full flex items-center justify-center">
                <span id="sendOtpText">Send OTP</span>
                <span id="sendOtpSpinner" class="hidden ml-2">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                </span>
            </button>
            <div id="otpSection" class="hidden mt-4">
                <label class="block text-gray-700">Enter OTP</label>
                <input type="text" id="customerOTP" class="w-full p-2 border rounded mt-1" placeholder="Enter OTP">
                <button onclick="verifyOTP()" class="mt-4 bg-green-500 text-white px-4 py-2 rounded w-full">Verify OTP</button>
            </div>
        </div>

        <!-- Employee Login -->
        <div id="employeeLogin" class="hidden mt-6">
            <label class="block text-gray-700">Employee ID</label>
            <input type="text" id="employeeID" class="w-full p-2 border rounded mt-1" placeholder="Enter Employee ID">
            <label class="block text-gray-700 mt-4">Password</label>
            <input type="password" id="employeePassword" class="w-full p-2 border rounded mt-1" placeholder="Enter Password">
            <button onclick="loginEmployee()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded w-full flex items-center justify-center">
                <span id="loginText">Login</span>
                <span id="loginSpinner" class="hidden ml-2">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                </span>
            </button>
        </div>
    </div>

    <script>
        // Tab Switching
        document.getElementById("customerTab").addEventListener("click", function() {
            document.getElementById("customerLogin").classList.remove("hidden");
            document.getElementById("employeeLogin").classList.add("hidden");
        });

        document.getElementById("employeeTab").addEventListener("click", function() {
            document.getElementById("employeeLogin").classList.remove("hidden");
            document.getElementById("customerLogin").classList.add("hidden");
        });

        // Send OTP
        function sendOTP() {
            const email = document.getElementById("customerEmail").value;
            fetch("{{ route('send.otp') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({ email }),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                document.getElementById("otpSection").classList.remove("hidden");
            })
            .catch(error => {
                alert("Failed to send OTP. Please try again.");
            });
        }

        // Verify OTP
        function verifyOTP() {
            const otp = document.getElementById("customerOTP").value;
            fetch("{{ route('verify.otp') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({ otp }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("OTP verified successfully!");
                    window.location.href = data.redirect;
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                alert("Failed to verify OTP.");
            });
        }

        // Employee Login
        function loginEmployee() {
            const id = document.getElementById("employeeID").value;
            const password = document.getElementById("employeePassword").value;

            // Check if fields are empty
            if (!id || !password) {
                alert("Please fill in both fields.");
                return;
            }

            // Show loading spinner
            document.getElementById("loginText").classList.add("hidden");
            document.getElementById("loginSpinner").classList.remove("hidden");

            // Simulate login process
            setTimeout(() => {
                document.getElementById("loginText").classList.remove("hidden");
                document.getElementById("loginSpinner").classList.add("hidden");

                // Check credentials
                if (id === "flavour123" && password === "1234") {
                    alert("Login Successful! Redirecting to Admin Page...");
                    window.location.href = "/admin"; // Redirect to the admin page
                } else {
                    alert("Invalid Credentials");
                }
            }, 2000);
        }
    </script>
</body>
</html>
