@extends('navbarfooter')
@section('title', 'Refund')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="bg-secondary-subtle p-5 m-5">
            <center>
            <h3 style="color: #821616; font-family:inter;"><b>Are you sure you want to refund?</b></h3>
            </center>
            <div class="col-12 my-5"> <!-- Single column for each card -->
                <div class="card mb-3 shadow-sm" style="display: flex; flex-direction: row; align-items: center;">
                    <div style="width: 32%; position: relative; border-radius: 8px 0 0 8px; overflow: hidden; height: 100%;">
                        <img src="{{ $tour->image ?? 'placeholder.jpg' }}" alt="{{ $tour->region_id }}" style="width: 95%; height: 200px; object-fit: cover;">
                        <div style="position: absolute; bottom: 0; left: 0; width: 95%; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 5px; text-align: center; font-size: 0.9rem;">
                            <span>{{ \Carbon\Carbon::parse($tour->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($tour->end_date)->format('d M Y') }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $tour->tour_name }}</h5>
                        <p class="text-muted">Guided by: {{ $tour->tour_guides->name ?? 'Unknown' }}</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Price Section -->
                            <h6 class="mb-0 text-primary" style="font-size: 16px; color: #110101;">IDR {{ number_format($price, 0, ',', '.') }}</h6>

                            <!-- Star Rating Section -->
                            <div class="d-flex align-items-center" style="gap: 5px;"> <!-- Ensures icon and text are aligned and spaced -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#E26A1F" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <span style="font-size: 16px; color: #E26A1F;">{{ $tour->rating }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <center>
            <div class="" style="width: 43%;">
                <p>Refunding this tour would lead to full cancellation of your booking. You will lose your slot and your deposit. This action cannot be undone.</p>
            </div>
            <form action="{{ url('profile/refund/'.$booking_id.'/'.$customer_id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-lg px-5 m-2" onclick="return confirm('Are you sure you want to refund your booking?')" style="background-color: white; color: #821616; font-size: 16px;"><b>Refund</b></button>
                <a href="{{ url('profile/'.$customer_id) }}" class="btn btn-lg px-5 m-2" style="background-color: #821616; color: white; font-size: 16px;"><b>Cancel</b></a>
            </form>
            </center>
        </div>
    </div>
    <div style="height: 400px;"></div>
    </div>
</body>
</html>

@endsection
