@extends('navbarfooter')
@section('title', 'Profile')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<style>
    .row{
        justify-content: space-between;
    }
    .circle {
        width: 100px; /* Set the width of the circle */
        height: 100px; /* Set the height of the circle */
        border-radius: 50%; /* Make the shape circular */
        overflow: hidden; /* Ensure the image does not overflow the circle */
        display: flex; /* Center content inside the circle */
        justify-content: center;
        align-items: center;
        background-color: black;
        margin-right: 100px;
    }

    .circle img {
        height: 150%; /* Adjust height to fit */
        object-fit: cover; /* Ensure the image is not stretched */
    }

    .edit{
        text-align: right;
    }
  </style>

<div class="container m-5">
    <h3 style="font-family: maginia; font-size: 30px; color: #821616;" class="pb-3"><b>Profile</b></h3>
    <div class="row bg-secondary-subtle p-5 m-1">
        <div class="col-3 circle">
            {{-- <img src="{{ $profile->profile_image ?? asset('images/default-profile.png') }}" alt="Profile Image"> --}}
            <img src="https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2264922221.jpg" alt="Profile Image">
        </div>
        <div class="col-3">
            <b>
                Full Name<br>
                Phone Number<br>
                Email<br>
                Birthday<br>
                Gender<br>
            </b>
        </div>
        <div class="col-3">
            {{ $profile->name ?? 'Name not available' }}<br>
            {{ $profile->phone ?? 'Phone not available' }}<br>
            {{ $profile->email ?? 'Email not available' }}<br>
            {{ $profile->birthday ?? 'Birthday not available' }}<br>
            {{ ucfirst($profile->gender ?? 'Gender not specified') }}<br>
        </div>
        <div class="col-3 edit">
            <b><a href="{{ url('profile/edit/'.$profile->id) }}" style="color: #821616; text-decoration: none; text-align: right;">✎ Edit</a></b>
        </div>
    </div>

    <h3 style="font-family: maginia; font-size: 30px; color: #821616; margin-top: 50px;" class="pb-3"><b>My Bookings</b></h3>
    <div class="row bg-secondary-subtle p-5 m-1">
        @forelse ($profile->tour_bookings as $booking)
        <div class="col-12">
            <div class="card mb-3 shadow-sm" style="display: flex; flex-direction: row; align-items: center;">
                <div style="width: 32%; position: relative; border-radius: 8px 0 0 8px; overflow: hidden; height: 100%;">
                    <img src="{{ $booking->tours->image ?? asset('images/placeholder.jpg') }}" alt="{{ $booking->tours->region_id }}" style="width: 95%; height: 210px; object-fit: cover;">
                    <div style="position: absolute; bottom: 0; left: 0; width: 95%; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 5px; text-align: center; font-size: 0.9rem;">
                        <span>{{ \Carbon\Carbon::parse($booking->tours->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($booking->tours->end_date)->format('d M Y') }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $booking->tours->tour_name }}</h5>
                    <p class="text-muted">Guided by: {{ $booking->tours->tour_guides->name ?? 'Unknown' }}</p>
                    <small class="text-muted">Booked For: {{ $booking->quantity }} people</small>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0 text-primary">IDR {{ number_format($booking->total_price, 0, ',', '.') }}</h6>
                            <small>Deposit 50%</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#E26A1F" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                            <span>{{ $booking->tours->rating }}</span>
                        </div>
                        <a href="/profile/refund/{{ $booking->id }}/{{ $booking->tours->id }}/{{ $booking->total_price }}/{{ $booking->customer_id }}" class="btn btn-sm px-3" style="background-color: lightgray; color: #821616;">Refund</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>No bookings found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
