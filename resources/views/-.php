@extends('navbarfooter')
@section('title', 'Book Now')

@section('content')
<div class="booking-container">
    <div class="hero-section text-center">
        <img src="{{ asset('image/halongbay.jpeg') }}" alt="Halong Bay" class="img-fluid" style="height: 300px; object-fit: cover;">
        <h1>Halong Bay</h1>
        <p>[RATING] ⭐ | [TOUR DATE] | [BOOKED TOUR]+ booked</p>
        <p class="description-font">Halong Bay, located in the Gulf of Tonkin in northern Vietnam, is famous for its stunning natural beauty. Known for its emerald waters and thousands of towering limestone islands topped with rainforests, the bay is a UNESCO World Heritage site and one of the most popular tourist destinations in Vietnam. Visitors can explore Halong Bay via cruises, kayaking, hiking, and visiting caves and islands.</p>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <h2>3-Day Halong Bay Itinerary</h2>
                <div class="itinerary">
                    <h4>Day 1: Arrival & Cruise Exploration</h4>
                    <ul class="mb-4">
                        <li class="mb-2"><strong>Morning:</strong> Depart from Hanoi (3-4 hours). Board your cruise and enjoy a welcome drink.</li>
                        <li class="mb-2"><strong>Afternoon:</strong> Visit Sung Sot Cave (Surprise Cave), then hike Tit Top Island for panoramic views.</li>
                        <li class="mb-2"><strong>Evening:</strong> Dinner on board with a sunset view, followed by optional cooking class or stargazing.</li>
                    </ul>
                    <h4>Day 2: Exploration & Relaxation</h4>
                    <ul class="mb-4">
                        <li class="mb-2"><strong>Morning:</strong> Kayaking around the bay and exploring hidden caves.</li>
                        <li class="mb-2"><strong>Afternoon:</strong> Visit a local fishing village and relax on the deck.</li>
                        <li class="mb-2"><strong>Evening:</strong> Enjoy onboard entertainment and a farewell dinner.</li>
                    </ul>
                    <h4>Day 3: Return to Hanoi</h4>
                    <ul class="mb-4">
                        <li class="mb-2"><strong>Morning:</strong> Early morning Tai Chi session on the deck, followed by breakfast.</li>
                        <li class="mb-2"><strong>Late Morning:</strong> Return to Hanoi.</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="booking-details bg-light p-4 rounded">
                    <h2>Booking Details</h2>
                    <table class="table">
                        <tr>
                            <th>Date</th>
                            <td>[TOUR DATE]</td>
                        </tr>
                        <tr>
                            <th>Tour Guide</th>
                            <td>[TOUR GUIDE NAME]</td>
                        </tr>
                        <tr>
                            <th>Language</th>
                            <td>[TOUR LANG]</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>[TOUR PRICE]</td>
                        </tr>
                    </table>

                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                        </div>
                        <div class="mb-3">
                            <strong>Total:</strong> [PRICE*QUANTITY]
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    h2 {
        font-family: 'Maginia', sans-serif;
        color: #8B0000; 
        font-weight: bold;
    }

    .hero-section img {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    .description-font {
        font-family: 'Inter', sans-serif;
        color: black;
        padding-left: 15%; 
        padding-right: 15%;
    }

    .table th {
        text-align: left;
        width: 30%;
    }
    .table td {
        text-align: right;
    }
    .booking-details {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .btn-danger {
        background-color: #c0392b;
        border: none;
    }

    .itinerary ul {
        padding-left: 20px;
    }
    .itinerary ul li {
        margin-bottom: 10px;
    }
</style>
@endsection 

