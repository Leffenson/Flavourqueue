<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client; // Add this line to import the Twilio Client class

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function sendOtp(Request $request)
    {
        // Validate the mobile number input
        $request->validate([
            'mobile' => 'required|digits:10',
        ]);

        // Generate a 6-digit random OTP
        $otp = rand(100000, 999999);

        // Store the OTP and mobile number in session (for simplicity)
        Session::put('otp', $otp);
        Session::put('mobile', $request->mobile);

        // Twilio Integration
        $account_sid = env('TWILIO_SID'); // Twilio Account SID from .env file
        $auth_token = env('TWILIO_AUTH_TOKEN'); // Twilio Auth Token from .env file
        $twilio_number = env('TWILIO_PHONE_NUMBER'); // Twilio phone number from .env file

        try {
            $client = new Client($account_sid, $auth_token);
            $client->messages->create(
                '+91' . $request->mobile, // Include country code (+91 for India)
                [
                    'from' => $twilio_number,
                    'body' => "Your OTP is: $otp",
                ]
            );

            // Return a success message
            return back()->with('success', 'OTP has been sent to your mobile number.');
        } catch (\Exception $e) {
            // Handle errors (e.g., incorrect credentials, SMS failures)
            return back()->withErrors(['mobile' => 'Failed to send OTP. Please try again later.']);
        }
    }
}
