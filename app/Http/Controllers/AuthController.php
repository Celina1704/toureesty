<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Tours;
use App\Models\tour_guides;
use App\Models\Regions;
use App\Models\Tour_Bookings;
use PhpOption\None;

use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    // Show the login page
    public function showLoginPage()
    {
        return view('auth.login');
    }

    // Handle login submission
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'loginError' => 'Invalid credentials. Please check your email or password.',
        ])->withInput();
    }

    // Show the sign-up page
    public function showSignupPage()
    {
        return view('auth.signup');
    }

    // Handle sign-up submission
    public function signup(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|string|max:15|regex:/^[0-9]{10,15}$/',
            'birthday' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $age = \Carbon\Carbon::parse($value)->age;
                    if ($age < 18) {
                        $fail('You must be at least 18 years old to sign up.');
                    }
                }
            ],
            'gender' => 'required|in:Male,Female,Other',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name must not exceed 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'Passwords do not match.',
            'phone.required' => 'The phone number field is required.',
            'phone.string' => 'The phone number must be a string.',
            'phone.max' => 'The phone number must not exceed 15 characters.',
            'phone.regex' => 'Please provide a valid phone number (e.g., 1234567890).',
            'birthday.required' => 'The birthday field is required.',
            'birthday.date' => 'Please provide a valid date.',
            'gender.required' => 'Please select a gender.',
            'gender.in' => 'The selected gender is invalid.',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['phone'],
            'birthday' => $validatedData['birthday'],
            'gender' => $validatedData['gender'],
        ]);

        // Log the user in after registration
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Show the dashboard (only if logged in)
    public function showDashboard()
    {
        return view('dashboard');
    }

    // Handle log out
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginPage');
    }


}
