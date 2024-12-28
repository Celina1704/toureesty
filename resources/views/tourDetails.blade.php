@extends('navbarfooter')
@section('title', 'TourDetails')

@section('content')
{{-- STYLESHEET --}}
<style>
    .image{
        width: 85%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 50px auto;
        margin-bottom: 20px;
    }

    .image img{
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        object-position: top;
    }

    .title{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .details{
        justify-items: center;
        font-weight: bolder;
    }

    .details .items{
        display: flex;
        align-items: center;
        margin: 0px;
    }

    .circle-icon {
      width: 26px;
      height: 20px;
      background-color: rgba(128, 0, 0);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
    }

    .itinerary{
        display: flex;
        justify-content: space-between;
    }

    .booking_details1{
        width: 100%;
    }

    .booking_details{
        width: 90%;
        background-color: #f5f5f5;
        border-radius: 2px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .booking_details .quantity{
        display: flex;
        justify-content: space-between;
    }

    .booking_details .total{
        display: flex;
        justify-content: space-between;
    }

    .booking_details .total button{
        height: 40px;
        margin-top: 8px;
        font-size: 18px;
        background-color: rgba(128, 0, 0);
        color: white;
    }

</style>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

{{-- CONTENT --}}

<div class="container-fluid", style="width: 100%">
    {{-- image --}}
    <div class="image">
        <img src="{{ $tour->image }}" alt="">
    </div>

    {{-- title & details --}}
    <div class="title">
        <h1>{{ $tour->tour_name }}</h1>
    </div>
    <div class="details">
        <div class="items d-flex justify-content-center" style="gap: 5px;"> <!-- Ensures icon and text are aligned and spaced -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#E26A1F" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
            <span style="font-size: 16px; color: #E26A1F;">{{ $tour->rating }}</span>
            <h5 class="items">•</h5>
            <h5 class="items">{{ \Carbon\Carbon::parse($tour->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($tour->end_date)->format('M d, Y') }}</h5>
            <h5 class="items">•</h5>
            <h5 class="items">{{ $tour->num_people_booked }}+ booked</h5>
        </div>
    </div>
    {{-- description --}}
    <div class="row mt-5 mb-5">
        <div class="col-1"></div>
        <div class="col-10">
            <h6 style="text-align:justify;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati autem sunt inventore dolores natus fugit neque aspernatur totam eligendi distinctio, veritatis similique amet velit officiis necessitatibus doloremque explicabo soluta. Corporis molestias, quos reiciendis suscipit illum delectus consequuntur repellat labore earum impedit ex, porro, quas quaerat maiores necessitatibus. Amet ut temporibus nemo iure reprehenderit dolorem veritatis maiores, aperiam veniam unde molestias culpa quod velit, blanditiis vero! Eos fugit tempore nihil vitae delectus qui, amet obcaecati explicabo dignissimos distinctio enim. Modi, earum quas ratione sunt quis dignissimos doloremque sequi voluptate amet ipsa maxime reprehenderit, libero nihil praesentium mollitia aspernatur minus! Voluptas, recusandae!</h6>
        </div>
        <div class="col-1"></div>
    </div>

    {{-- columns --}}
    <div class="row">
        <div class="col-1"></div>
        <div class="col-5">
            <h2 style="font-family: maginia; color: rgba(128, 0, 0, 0.7)"><b>3 Day {{ $tour->region->region ?? 'Unknown Region'}} Itinerary:</b></h2>
            <h5><b>Day 1: Arrival & Cruise Exploration</b></h5>
            <div class="itinerary">
                <div class="circle-icon"></div><h6><b>Morning:</b> Depart from Jakarta (3-4 hours). Board your cruise and enjoy welcoming drinks</h6>
            </div>
            <div class="itinerary">
                <div class="circle-icon"></div><h6><b>Afternoon:</b> Depart from Jakarta (3-4 hours). Board your cruise and enjoy welcoming drinks</h6>
            </div>
            <div class="itinerary">
                <div class="circle-icon"></div><h6><b>Evening:</b> Depart from Jakarta (3-4 hours). Board your cruise and enjoy welcoming drinks</h6>
            </div>
            <br>
            <h5><b>Day 2: Arrival & Cruise Exploration</b></h5>
            <div class="itinerary">
                <div class="circle-icon"></div><h6><b>Morning:</b> Depart from Jakarta (3-4 hours). Board your cruise and enjoy welcoming drinks</h6>
            </div>
            <div class="itinerary">
                <div class="circle-icon"></div><h6><b>Afternoon:</b> Depart from Jakarta (3-4 hours). Board your cruise and enjoy welcoming drinks</h6>
            </div>
            <div class="itinerary">
                <div class="circle-icon"></div><h6><b>Evening:</b> Depart from Jakarta (3-4 hours). Board your cruise and enjoy welcoming drinks</h6>
            </div>
            <br>
            <h5><b>Day 3: Arrival & Cruise Exploration</b></h5>
            <div class="itinerary">
                <div class="circle-icon"></div><h6><b>Morning:</b> Depart from Jakarta (3-4 hours). Board your cruise and enjoy welcoming drinks</h6>
            </div>
            <div class="itinerary">
                <div class="circle-icon"></div><h6><b>Afternoon:</b> Depart from Jakarta (3-4 hours). Board your cruise and enjoy welcoming drinks</h6>
            </div>
            <div class="itinerary">
                <div class="circle-icon"></div><h6><b>Evening:</b> Depart from Jakarta (3-4 hours). Board your cruise and enjoy welcoming drinks</h6>
            </div>
            <br>
        </div>
        <div class="col-1"></div>

        <div class="col-4">
            <h2 style="font-family: maginia; color: rgba(128, 0, 0, 0.7)"><b>Booking Details:</b></h2>
            <div class="booking_details1">
                <form action="{{ url('bookTour/'.$tour->id.'/'.Auth::user()->id) }}" method="POST">
                    @csrf
                    <div class="booking_details">
                        <h6><b>Date</b></h6>
                        <h6>{{ \Carbon\Carbon::parse($tour->start_date)->format('d') }} - {{ \Carbon\Carbon::parse($tour->end_date)->format('d F, Y') }}</h6>
                        <br>
                        <h6><b>Tour Guide</b></h6>
                        <h6>{{ $tour->tour_guides->name }}</h6>
                        <br>
                        <h6><b>Language</b></h6>
                        <h6>{{ $tour->language }}</h6>
                        <br>
                        <h6><b>Quantity</b></h6>
                        <div class="quantity">
                            <div>
                                <h6 style='margin-bottom:0;'>1 person</h6>
                                <small id="price" style='margin-top: 0;'>Rp {{ number_format($tour->price, 0, ',', '.') }}</small>
                            </div>
                            <input type="number" id="quantity" onchange="calculateTotal()" placeholder="0" style="width:30%; padding-left:10px; margin-right:50px;" min="1" required>
                        </div>
                        <br>
                        <div class="total">
                            <div>
                                <h3 style="margin-bottom: 0px;"><span id="total">Rp 0</span></h3>
                                <small style="margin-top: 0;">Deposit 50%</small>
                                <input type="hidden" id="totalValue" name="total"> <!-- Hidden input field -->
                                <input type="hidden" id="quantityValue" name="quantity"> <!-- Hidden input field -->
                            </div>
                            <button type="submit" class="btn btn-lg d-flex align-items-center justify-content-center">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 50px"></div>

<script>
    function calculateTotal() {
        // Get the quantity from the input field
        const quantity = document.getElementById('quantity').value;

        // Get the price from the text content of the small element and remove formatting
        const priceText = document.getElementById('price').innerText.replace(/Rp|\.|,/g, '').trim();
        const price = parseFloat(priceText); // Convert to a number

        // Calculate the total
        const total = quantity * price;

        // Display the total in the total span with proper formatting
        document.getElementById('total').innerText = total ? `Rp ${total.toLocaleString('id-ID')}` : 'Rp 0';

        // Update the hidden input value
        document.getElementById('totalValue').value = total ? total : 0;
        document.getElementById('quantityValue').value = quantity ? quantity : 0;
    }

</script>

@endsection
