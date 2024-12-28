@extends('navbarfooter')
@section('title', 'About Us')
<!-- haha -->
@section('content')
<div class="about-us-container">
    <div class="hero-section text-white bg-dark-red">
        <div class="hero-text">
            <p class="hero_description1-font">ABOUT US</p>
            <h1 class="custom-font">We deliver culture</h1>
            <p class="hero_description2-font">Unveiling secrets and history in Indonesia's natural beauty is a marvel. It is our goal to share this with you in the most comfortable way possible.</p>
        </div>
        <img src="{{ asset('image/aboutus.png') }}" alt="About Us Image" class="img-fluid hero-image">
    </div>

    <div class="mission-vision-value py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <h2 class="custom-font">Our Mission</h2>
                    <p class="description-font">Our mission is to provide exceptional cultural experiences by exploring Indonesia's diverse natural beauty, traditions, and history. We aim to offer unforgettable journeys that connect people with the essence of Indonesia in the most comfortable and enriching way possible.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h2 class="custom-font">Our Vision</h2>
                    <p class="description-font">Our vision is to be a leading platform that bridges the gap between travelers and authentic cultural experiences in Indonesia. We strive to be recognized for our commitment to responsible tourism, cultural preservation, and sustainable travel practices.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h2 class="custom-font">Our Values</h2>
                    <p class="description-font">We are guided by values of integrity, respect for local cultures, sustainability, and providing high-quality service. Our goal is to make every interaction with our customers a rewarding experience, ensuring they leave with a deeper understanding and appreciation of Indonesia's unique heritage.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="partners-section py-5">
        <div class="container text-center">
            <h2 class="custom-font">Our Partners:</h2>
            <div class="partners-logo">
                <img src="{{ asset('image/traveloka.png') }}" alt="Traveloka">
                <img src="{{ asset('image/tiket.png') }}" alt="Tiket">
                <img src="{{ asset('image/gojek.png') }}" alt="Gojek">
                <img src="{{ asset('image/grab.png') }}" alt="Grab">
            </div>
        </div>
    </div>

    {{-- <footer class="text-center py-3 bg-dark-red text-white">
        <p>&copy; {{ date('Y') }} Your Company Name. All Rights Reserved.</p>
    </footer> --}}
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Maginia&family=Inter:wght@400;600&display=swap');

    /* Headings */
    .custom-font {
        font-family: 'Maginia', sans-serif;
        color: #8B0000;
    }

    .hero-text h1.custom-font {
        font-weight: bold;
        color: white;
    }

    .hero-text .hero_description1-font {
        color: white;
        font-weight: bold;
    }

    .hero-text .hero_description2-font {
        color: white;
    }

    /* Paragraph text */
    .description-font {
        font-family: 'Inter', sans-serif;
        color: black;
    }

    .bg-dark-red {
        background-color: #8B0000;
        color: white;
    }

    .hero-section {
        position: relative;
        display: flex;
        justify-content: flex-start;
    }

    .hero-text {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        padding-left: 45%;
        padding-right: 10%;
        padding-top: 15%;
        text-align: left;
        font-size: 20px;
    }

    .hero-image {
        width: 100%;
        height: auto;
        opacity: 1;
    }

    .partners-logo img {
        margin: 0 15px;
        max-height: 50px;
    }

    .mission-vision-value p,
    .partners-section p {
        font-family: 'Inter', sans-serif;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-text {
            padding-left: 50%; /* Less padding on smaller screens */
            padding-right: 10%;
            font-size: 18px; /* Adjust font size for smaller screens */
        }

        .hero-text h1.custom-font {
            font-size: 24px; /* Adjust heading size for smaller screens */
        }

        .hero-text p {
            font-size: 16px; /* Adjust paragraph size for smaller screens */
        }
    }

    @media (max-width: 576px) {
        .hero-text {
            padding-left: 25%; /* Even less padding on very small screens */
        }

        .hero-text h1.custom-font {
            font-size: 22px; /* Smaller heading size on very small screens */
        }

        .hero-text p {
            font-size: 14px; /* Smaller paragraph size */
        }

        .partners-logo img {
            max-height: 40px; /* Smaller logos on smaller screens */
        }
    }
</style>
@endsection
