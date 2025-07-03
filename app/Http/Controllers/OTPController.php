<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;

class OTPController extends Controller
{
    public function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $otp = rand(1000, 9999);

        session(['otp' => $otp, 'email' => $email]);

        // Send OTP via email
        \Mail::raw("Your OTP for FlavourQueue is: $otp", function ($message) use ($email) {
            $message->to($email)
                    ->subject('FlavourQueue OTP Verification');
        });

        return response()->json(['message' => 'OTP sent to your email.']);
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4',
        ]);

        if (session('otp') == $request->input('otp')) {
            session()->forget('otp');
            // Redirect to home page after successful verification
            return response()->json(['success' => true, 'redirect' => route('home')]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid OTP'], 400);
        }
    }
}
