<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use App\Models\tour_guides;
use App\Models\Regions;
use App\Models\Tour_Bookings;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOption\None;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function tour(){
        // $tour = Tours::all();
        // $tour = Tours::Paginate(3);
        // $tour = Tours::with('tour_guides')->get();
        $tour = Tours::with('tour_guides')->paginate(3);
        return view('tour', ['tour' => $tour]);
        // return view('tour', compact("tour"));
    }

    public function aboutus(){
        return view('aboutus');
    }

    public function profile($id) {
        $customerId = Auth::id(); // Get logged-in user ID

        // Check if the requested user ID matches the logged-in user ID
        if ($id != $customerId) {
            return redirect()->route('dashboard');
        }

        $profile = User::with('tour_bookings.tours')->find($id);

        if (!$profile) {
            return redirect()->route('home')->with('error', 'Customer not found.');
        }

        return view('profile', compact('profile', 'id'));
    }

    public function editProfile($id){
        $profile = User::find($id);

        return view('editProfile', ['profile'=>$profile]);
    }

    public function updateProfile(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id, // Allow current email
            'password' => 'nullable|min:8|confirmed', // Add password validation if updating password
            'phone' => 'nullable|string|max:15|regex:/^[0-9]{10,15}$/', // Numeric-only validation
            'birthday' => [
                'nullable',
                'date',
                'before:today',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $age = \Carbon\Carbon::parse($value)->age;
                        if ($age < 18) {
                            $fail('You must be at least 18 years old to update your profile.');
                        }
                    }
                }
            ],
            'gender' => 'nullable|in:Male,Female,Other',
        ], [
            'email.unique' => 'This email is already taken.',
            'phone.regex' => 'The phone number must be numeric and between 10 and 15 digits.',
            'birthday.before' => 'The birthday must be a date before today.',
            'gender.in' => 'The gender must be Male, Female, or Other.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        // Find the user
        $profile = User::findOrFail($id);

        // Update only the fields that are present in the request
        $profile->fill($validatedData);

        // If password is provided, hash it and update
        if ($request->filled('password')) {
            $profile->password = Hash::make($validatedData['password']);
        }

        // Save the profile
        $profile->save();

        return redirect()->route('profile', ['id' => $id])->with('success', 'Profile updated successfully.');
    }

    // public function profile($customerId){
    //     // $profile = Tour_Bookings::with(['tours', 'customers'])
    //     // ->whereHas('customers', function($query){
    //     //     $query->where('id', 1);
    //     // })->get();
    //     // $profile = DB::table('tour_bookings')
    //     // ->join('customers', 'customers.id', '=', 'tour_bookings.customer_id')
    //     // ->where('customers_id', 1)
    //     // ->select('tour_bookings*', 'customers.*');
    //     $profile = User::with('tour_bookings.tours')->find($customerId);
    //     if(!$profile){
    //         return redirect()->route('home')->with('error', 'Customer not found.');
    //     }
    //     return view('profile', ['profile' => $profile]);
    // }

    // public function booknow($tourId){
    //     $tour = Tours::findOrFail($tourId); // Find the tour by ID
    //     return view('booknow', compact('tour'));
    // }

    public function showTourGuides(){
        $tour_guides = tour_guides::all();
        return view('tour_guides.index', compact('tour_guides'));
    }

    public function tourDetails($id){
        // $tour = Tours::find($id);
        $tour = Tours::with(['tour_guides', 'region'])->find($id);
        return view("tourDetails", ['tour'=>$tour]);
    }

    public function bookTour(Request $request, $tour_id, $user_id){
        // $validatedData = $request->validate([
        //     'quantity' => 'required|integer|min:1',
        //     'total' => 'required|numeric|min:1',
        // ]);

        // // $quantity = $validatedData['quantity'];
        // $total = $validatedData['total'];

        // Tour_Bookings::create([
        //     'user_id' => auth()->id(),
        //     'tour_id' => $id,
        //     'total_price' => $total,
        // ]);

        // $tour_booking = Tour_Bookings::find($id);
        $tour = Tours::find($tour_id);
        $booking = new Tour_Bookings();
        $booking->customer_id = $user_id;
        $booking->tour_id = $tour->id;
        $booking->total_price = $request->total;
        $booking->quantity = $request->quantity;

        return view("payment", compact('booking', 'tour'));
    }

    public function confirmBooking(Request $request)
    {
        // Decode the serialized booking data
        $booking = json_decode($request->input('booking'), true);

        // Save the booking to the database
        $booking = new Tour_Bookings($booking);
        $booking->save();

        return view('confirmBooking', ['user_id'=>$booking->customer_id]); // The sign-up form view
    }

    public function refund($booking_id, $tour_id, $price, $customer_id){
        // Retrieve the profile and tour using the IDs
        $tour = Tours::with(['tour_guides'])->find($tour_id);

        return view('refund', compact('booking_id', 'tour', 'price', 'customer_id'));
    }

    public function destroy($booking_id, $customer_id){
        $booking = Tour_Bookings::findOrFail($booking_id);
        $booking->delete();

        return redirect()->route('profile', ['id' => $customer_id])->with('success', 'Booking refunded successfully.');
    }
}
