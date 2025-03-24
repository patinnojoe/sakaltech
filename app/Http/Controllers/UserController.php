<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'course' => 'required|string',
            'password' => 'nullable|min:6'
        ]);

        // Course Prices
        $coursePrices = [
            'AWS Cloud' => '£300',
            'AWS DevOps Engineering' => '£900',
            'BA/PM' => '£800',
            'Frontend Dev' => '£350',
            'Backend Dev' => '£350',
            'Mobile Dev' => '£350'
        ];

        // Course Payment Links
        $paymentLinks = [
            'AWS Cloud' => 'https://buy.stripe.com/9AQaFggRWgZV7FS9AL',
            'AWS DevOps Engineering' => 'https://buy.stripe.com/fZe3cO8lqaBx2ly002',
            'BA/PM' => 'https://buy.stripe.com/4gw3cO45a395f8k5kn',
            'Frontend Dev' => 'https://buy.stripe.com/8wM14G45a9xt7FS005',
            'Backend Dev' => 'https://buy.stripe.com/14k00CfNS8tpgco3cj',
            'Mobile Dev' => 'https://buy.stripe.com/fZe00Caty7pl3pC5kt'
        ];

        $course = $validated['course'];
        $coursePrice = $coursePrices[$course] ?? 'Unknown Price';
        $paymentLink = $paymentLinks[$course] ?? 'N/A';

        // Save User
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'course' => $validated['course'],
            'password' => Hash::make('default123')
        ]);

        // Send Email
        Mail::to($user->email)->send(new WelcomeMail($user, $coursePrice, $paymentLink));

        return response()->json([
            'message' => 'Registration successful. Email sent.',
            'user' => $user
        ]);
    }

    public function allUsers()
    {
        $users = User::orderBy('created_at', 'desc')->get(); // Fetch users with the latest first
        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }
}
