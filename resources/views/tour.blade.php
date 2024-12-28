@extends('navbarfooter')
@section('title', 'Tour')

@section('content')
<style>
    .pagination .page-link {
        color: #821616;
        border-color: #821616;
    }

    .pagination .page-item.active .page-link {
        background-color: #821616;
        border-color: #821616;
        color: white;
    }

    .pagination .page-link:hover {
        background-color: #9F4243; /* Slightly lighter red on hover */
        color: white;
    }
</style>

<div class="container py-5">
    <div class="row g-4">
        @foreach ($tour as $t)
            <div class="col-12"> <!-- Single column for each card -->
                <div class="card mb-3 shadow-sm" style="display: flex; flex-direction: row; align-items: center;">
                    <div style="width: 32%; position: relative; border-radius: 8px 0 0 8px; overflow: hidden; height: 100%;">
                        <img src="{{ $t->image ?? 'placeholder.jpg' }}" alt="{{ $t->regionid }}" style="width: 95%; height: 200px; object-fit: cover;">
                        <div style="position: absolute; bottom: 0; left: 0; width: 95%; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 5px; text-align: center; font-size: 0.9rem;">
                            <span>{{ \Carbon\Carbon::parse($t->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($t->end_date)->format('d M Y') }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $t->tour_name }}</h5>
                        <p class="text-muted">Guided by: {{ $t->tour_guides->name ?? 'Unknown' }}</p>
                        <div> {{-- Number of people booked --}}
                            <small class="text-muted">
                                Booked: {{ $t->num_people_booked }} people
                            </small>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Price Section -->
                            <h6 class="mb-0 text-primary" style="font-size: 16px; color: #110101;">IDR {{ number_format($t->price, 0, ',', '.') }}</h6>

                            <!-- Star Rating Section -->
                            <div class="d-flex align-items-center" style="gap: 5px;"> <!-- Ensures icon and text are aligned and spaced -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#E26A1F" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <span style="font-size: 16px; color: #E26A1F;">{{ $t->rating }}</span>
                            </div>

                            <!-- Book Now Button -->

                            @if (Auth::check())  <!-- Check if the user is logged in -->
                                <form action="{{ url('bookTour/'.$tour->id.'/'.Auth::user()->id) }}" method="POST">
                                    @csrf
                                    <a href="/tour_details/{{ $t->id }}" class="btn btn-sm" style="background-color: #821616; color: white; font-size: 16px;">See Details</a>
                                </form>
                            @else
                                <p>You must be logged in to book a tour. <a href="{{ route('login') }}">Log in</a></p>
                            @endif
                
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        {{-- @foreach ($tour->tours as $tg)
            <h3>$tg->name</h3>
        @endforeach --}}
    </div>

    <div class="mt-4">
        {{ $tour->links() }}
    </div>

    {{-- <!-- Pagination -->
    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
            <li class="page-item active" aria-current="page">
                <span class="page-link" style="background-color: #821616; color: white; border-color: #821616;">1</span>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" style="color: #821616; border-color: #821616;">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" style="color: #821616; border-color: #821616;">3</a>
            </li>
        </ul>
    </nav> --}}
</div>

@endsection
