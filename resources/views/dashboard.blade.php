@extends('navbarfooter')
@section('title', 'Dashboard & Home')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 38vh; text-align: center;">
    <div>
    <h3 class="inter" style="font-size: 30px; color: #821616; margin-bottom: -40px; margin-left: {{ App::getLocale() === 'id' ? '60px' : '0' }};">
            @lang('messages.welcome')
    </h3>
        <h1 class="maginia" style="font-size: 150px; color: #821616;">Indonesia</h1>
    </div>
</div>

{{-- carousel --}}
<div id="carouselExampleCaptions" class="carousel slide mx-auto" style="width: 85%; height: 65vh;">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner" style="height: 55vh; position:relative; text-align: center; color: white;">
      <div class="carousel-item active" style="position: relative;">
        <img src="https://www.torntackies.com/wp-content/uploads/2022/05/Borobudur-Java.jpg" class="d-block w-100" alt="Borobudur Temple">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
        <div class = "carousel-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <h1 style="font-size: 30px; font-weight: bold; color: white;">@lang('messages.hello'), {{ Auth::user()->name }}!</h1>
            <h3 style="font-size: 15px; color: white;">@lang('messages.glad')</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://torch.id/cdn/shop/articles/Artikel_157_-_Preview.webp?v=1710759080" class="d-block w-100" alt="Sea">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
        <div class = "carousel-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
          <h1 style="font-size: 30px; color: white;">
              @lang('messages.explore')
          </h1>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Dashboard Section -->
<div class="container mt-5 mb-5">
    <div class="row text-center">
        <div class="col-12">
            <h1 class="inter" style="font-size:70px; color: #821616;">@lang('messages.dashboard')</h1>
            <p class="inter lead" style="color: #821616;">@lang('messages.enjoy')</p>
        </div>
    </div>
</div>

<div class="grid-container">
    <div class="grid-item">
        <div class="card">
            <div class="card-overlay">
                <h3>TRENDING</h3>
                <h2>Hidden Gems in Sumba</h2>
          <button class="card-btn">See More</button>
        </div>
      </div>
    </div>
    <div class="grid-item">
      <div class="card">
        <img src="image2.jpg" alt="Celebrate New Years with Us" class="card-img">
        <div class="card-overlay">
          <h3>UPCOMING</h3>
          <h2>Celebrate New Years with Us</h2>
          <button class="card-btn">See More</button>
        </div>
      </div>
    </div>
    <div class="grid-item">
      <div class="card">
        <img src="image3.jpg" alt="The Best Bali Couple Tours" class="card-img">
        <div class="card-overlay">
          <h3>FAVORITE</h3>
          <h2>The Best Bali Couple Tours</h2>
          <button class="card-btn">See More</button>
        </div>
      </div>
    </div>
    <div class="grid-item">
      <div class="card see-all">
        <img src="image4.jpg" alt="See All" class="card-img">
        <div class="card-overlay">
          <h2>See All</h2>
          <button class="card-btn">→</button>
        </div>
      </div>
    </div>
</div>

@endsection

<style>
    .carousel-inner {
        display: flex;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 30px;
        justify-items: center;
    }

    .grid-item {
        position: relative;
        height: 350px; /* Increased the height to make the cards larger */
        width: 100%;
        max-width: 400px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .grid-item:hover {
        transform: scale(1.05);
    }

    .card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(128, 0, 0, 0.6);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        text-align: center;
        color: white;
        box-sizing: border-box;
    }

    .card-overlay h3 {
        font-size: 18px;
        text-transform: uppercase;
        margin: 0;
    }

    .card-overlay h2 {
        font-size: 22px;
        font-weight: 700;
        margin: 80% 0 10px 0;
        color: #821616;
    }

    .card-btn {
        background-color: #fff;
        color: #821616;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 10%;
    }

    .card-btn:hover {
        background-color: #ddd;
    }

    .see-all .card-overlay {
        justify-content: center;
    }

</style>
