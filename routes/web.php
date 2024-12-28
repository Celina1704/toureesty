<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

// =========================== PUBLIC ROUTES =============================

// Home page for non-authenticated users
Route::get('/', function () {
    return view('home');
})->name('home');

// About Us page
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');

// Tours listing page
Route::get('/tour', [PageController::class, 'tour'])->name('tour');

// Tour details page
Route::get('/tour_details/{id}', [PageController::class, 'tourDetails'])
    ->where('id', '[0-9]+') // Ensure `id` is numeric
    ->name('tourDetails');

// Booking a tour
Route::post('/bookTour/{tour_id}/{user_id}', [PageController::class, 'bookTour'])
    ->where('tour_id', '[0-9]+') // Ensure `id` is numeric
    ->where('user_id', '[0-9]+') // Ensure `id` is numeric
    ->name('bookTour');

// Payment page
Route::post('/bookTour/confirmBooking', [PageController::class, 'confirmBooking'])->name('confirmBooking');

// ========================== AUTH ROUTES ================================

// Authentication: Log In
Route::get('/login', [AuthController::class, 'showLoginPage'])
    ->middleware('guest') // Prevent authenticated users from accessing this
    ->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Authentication: Sign Up
Route::get('/signup', [AuthController::class, 'showSignupPage'])
    ->middleware('guest') // Prevent authenticated users from accessing this
    ->name('signupPage');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

// Authentication: Log Out
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth') // Only logged-in users can log out
    ->name('logout');

// Dashboard (only for authenticated users)
Route::get('/dashboard', [AuthController::class, 'showDashboard'])
    ->middleware('auth') // Protect with `auth` middleware
    ->name('dashboard');

// ======================= PROFILE & BOOKING ROUTES =======================

// // User profile (current authenticated user by default)
// Route::get('/profile/{id?}', [PageController::class, 'profile'])
//     ->middleware('auth') // Protect route
//     ->where('id', '[0-9]+') // Ensure `id` is numeric if provided
//     ->name('profile');

Route::get('profile/{id}', [PageController::class, 'profile'])->name('profile');

Route::get('profile/edit/{id}', [PageController::class, 'editProfile'])->name('editProfile');

Route::post('profile/updateProfile/{id}', [PageController::class, 'updateProfile'])->name("updateProfile");

// Confirming Refund route (for bookings)
Route::get('/profile/refund/{tourBooking_id}/{tour_id}/{price}/{customer_id}', [PageController::class, 'refund'])
    ->middleware('auth') // Protect route
    ->where([
        'tourBooking_id' => '[0-9]+',
        'tour_id' => '[0-9]+',
        'price' => '[0-9]+(\.[0-9]{1,2})?', // Allow price to include decimals
        'customer_id' => '[0-9]+',
    ])
    ->name('refund');

// Refund/Deleting a booking
Route::delete('/profile/refund/{tourBooking_id}/{customer_id}', [PageController::class, 'destroy'])
    ->middleware('auth') // Protect route
    ->where(['tourBooking_id' => '[0-9]+', 'customer_id' => '[0-9]+'])
    ->name('booking.refund');

// ========================= LOCALIZATION ROUTE ==========================

// Localization for changing app language
Route::get('locale/{lang}', [LocaleController::class, 'setLocale'])
    ->where('lang', '[a-zA-Z]{2}') // Restrict to 2-letter language codes
    ->name('setLocale');

// =======================================================================







// use App\Http\Controllers\PageController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\LocaleController;

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// // Route::get('/home', [PageController::class, 'index'])->name('home');

// // Public Home Route (accessible for non-authenticated users only)
// Route::get('/', function () {
//     return view('home'); // Home page view for non-authenticated users
// })->name('home');

// // Authenticated users will be redirected to dashboard if they try to access /home
// Route::middleware('auth')->get('/home', function () {
//     return redirect()->route('dashboard'); // Redirect authenticated users to the dashboard
// })->name('home_redirect');

// // Authenticated Dashboard Route
// Route::middleware('auth')->get('/dashboard', function () {
//     return view('dashboard'); // Dashboard page view for authenticated users
// })->name('dashboard');

// Route::get('/tour', [PageController::class, 'tour'])->name('tour');

// Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');

// Route::get('/tour_details/{id}', [PageController::class, 'tourDetails'])->name("tourDetails");

// Route::post('/bookTour/{id}', [PageController::class, 'bookTour'])->name("bookTour");

// Route::get('/profile/{id}', [PageController::class, 'profile'])->name('profile');

// Route::get('/profile/{tourBooking_id}/{tour_id}/{price}/{customer_id}', [PageController::class, 'refund'])->name('refund');

// Route::delete('/profile/{tourBooking_id}/{customer_id}', [PageController::class, 'destroy'])->name('booking.refund');

// // Route::get('/booknow/{tourId}', [PageController::class, 'booknow'])->name('booknow');
// // Route::get('/booknow', [PageController::class, 'booknow'])->name('booknow');

// // ========================================================================

// //AUTHENTICATION ROUTES
// // Routes for Log In and Sign Up
// Route::get('/login', [AuthController::class, 'showLoginPage'])->name('loginPage');
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::get('/signup', [AuthController::class, 'showSignupPage'])->name('signupPage');
// Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

// // Route for Dashboard (protected by authentication)
// Route::get('/dashboard', [AuthController::class, 'showDashboard'])->middleware('auth')->name('dashboard');

// // Log Out Route
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// // Localization
// Route::get('locale/{lang}', [LocaleController::class, 'setLocale']);

// // Registration Page
// Route::get('/payment', [PageController::class, 'showPaymentPage'])->name('paymentPage');




