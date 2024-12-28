@extends('navbarfooter')
@section('title', 'Home')

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
<div id="carouselExampleCaptions" class="carousel slide mx-auto" style="width: 85%; height: 65vh; ">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner" style="height: 55vh; position:relative; text-align: center; color: white;border-radius: 8px;">
      <div class="carousel-item active" style="position: relative;">
        <img src="https://www.torntackies.com/wp-content/uploads/2022/05/Borobudur-Java.jpg" class="d-block w-100" alt="Borobudur Temple">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
        <div class = "carousel-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
          <h1 style="font-size: 30px; color: white;">
              @lang('messages.discover')
          </h1>
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

<div class="grid-container">
  <div class="grid">
      <div class="card">
          <img src="https://www.sumbahospitalityfoundation.org/wp-content/uploads/2020/10/ratenggaro-village.jpg" alt="Sumba" class="card-img">
          <div class="card-overlay">
              <h3>TRENDING</h3>
              <h2>Hidden Gems in Sumba</h2>
              <button class="card-btn" href="/tour_details/{{ $t->3 }}">See More</button>
          </div>
      </div>
      <div class="card">
          <img src="https://www.agoda.com/wp-content/uploads/2024/11/Featured-image-New-Years-Eve-at-Puputan-Badung-Park-Denpasar-Bali-Indonesia-1244x700.jpg" alt="Celebrate New Years with Us" class="card-img">
          <div class="card-overlay">
              <h3>UPCOMING</h3>
              <h2>Celebrate New Years with Us</h2>
              <button class="card-btn" href="/tour_details/{{ $t->1 }}">See More</button>
          </div>
      </div>
  </div>
</div>

<div class = "grid-container">
  <div class ="grid">
      <div class="card">
          <img src="https://international.unud.ac.id/protected/storage/file_summernote/4a0885ebc3c02b217cbf6c079eca6b37.jpg" alt="The Best Bali Couple Tours" class="card-img">
          <div class="card-overlay">
              <h3>FAVORITE</h3>
              <h2>The Best Bali Couple Tours</h2>
              <button class="card-btn" href="/tour_details/{{ $t->2 }}">See More</button>
          </div>
      </div>
      <div class="card">
          <img src="https://asset-2.tstatic.net/wartakota/foto/bank/images/20160101-raja-ampat_20160101_070036.jpg" alt="See All" class="card-img">
          <div class="card-overlay">
              <h2>See All</h2>
              <button class="card-btn" href="/tour">→</button>
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

/* Center the grid-container within the page */
    .grid-container {
        display: flex;
        justify-content: center; /* Centers horizontally */
        align-items: center; /* Centers vertically */
        width: 100%; /* Ensure it takes full width */
        height: 300px; /* Make the container take the full height of the viewport */
        margin-bottom: 20px; /* Add top margin if needed */
    }

    /* Grid styling to have 2 cards per row and keep them centered */
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* 2 cards per row */
        gap: 20px;
        height: 300px;
        justify-items: center; /* Centers the cards within the grid */
        width: 100%;
        max-width: 85%; /* Optional: limit the maximum width of the grid */
    }

    .card {
        position: relative;
        height: 300px;
        width: 100%;
        max-width: 100%; /* Ensures the cards don't stretch too wide */
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .card img {
        height: 100%;
        width: 100%;
        background-size: cover;
        object-fit: cover; /* Ensures the image fills the space properly */
    }

    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
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
        margin: 0;
    }

    .card-overlay h2 {
        font-size: 22px;
        margin-top: 10px;
    }

    .card-btn {
        background-color: #fff;
        color: #821616;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        margin-top: 20px;
    }

    .see-all .card-overlay {
        justify-content: center;
        align-items: center;
    }

    .card-overlay h2 {
        font-size: 24px;
        margin-top: 20px;
    }

    .card-btn {
        margin-top: 20px;
        font-size: 20px;
    }


</style>
