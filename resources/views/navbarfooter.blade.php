<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Google Fonts: Maginia -->
    <link href="https://fonts.cdnfonts.com/css/maginia" rel="stylesheet">

    <title>@yield('title')</title>

</head>
<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #821616; padding: 10px 15px; z-index:100;">
        <div class="container-fluid">
            <a class="maginia navbar-brand text-white" href="{{ Auth::check() ? route('dashboard') : route('home') }}">Toureesty</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Route::currentRouteName() == 'home' || Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                           href="{{ Auth::check() ? route('dashboard') : route('home') }}">
                            @lang('messages.home')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Route::currentRouteName() == 'tour' ? 'active' : '' }}" href="{{ route('tour') }}">@lang('messages.tour')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Route::currentRouteName() == 'aboutus' ? 'active' : '' }}" href="{{ route('aboutus') }}">@lang('messages.about')</a>
                    </li>
                </ul>

                <!-- Right side with login/signup and logout -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          @lang('messages.language')
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="locale/en">English</a></li>
                          <li><a class="dropdown-item" href="locale/id">Indonesian</a></li>
                        </ul>
                    </li>
                    @auth
                        <!-- Show Logout Button if Authenticated -->
                        <li class="nav-item" style="margin-right: 20px">
                            <a class="nav-link text-white" href="{{ url('profile/'. Auth::user()->id) }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn-outline-danger">
                                    <div class="circle-icon"><i class="bi bi-box-arrow-right"></i></div>
                                    Log Out
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Show Log In / Sign Up Button if Not Authenticated -->
                        <li class="nav-item">
                            <a class="nav-link text-white btn-outline-danger" href="{{ route('login') }}">
                                <div class="circle-icon"><i class="bi bi-person"></i></div>
                                @lang('messages.login')
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="text-white" style="background-color: #821616; padding: 40px 20px;">
        <div class="container-fluid">
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('aboutus') }}" class="text-white text-decoration-none">@lang('messages.about')</a></li>
                        <li><a href="#" class="text-white text-decoration-none">@lang('messages.contact')</a></li>
                        <li><a href="#" class="text-white text-decoration-none">@lang('messages.privacy')</a></li>
                        <li><a href="#" class="text-white text-decoration-none">@lang('messages.term')</a></li>
                    </ul>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6 text-end">
                    <h3 class="maginia fw-bold">Toureesty</h3>
                    <p class="mt-5">&copy; {{ date('Y') }} All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

<style>
    .navbar {
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .nav-link {
        transition: color 0.3s ease, background-color 0.3s ease;
    }

    .nav-link:hover {
        font-weight: bold;
        color: white;
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .navbar-nav .nav-item .nav-link.active {
        font-weight: bold;
        text-decoration: underline;
        color: #fff;
    }

    /* Circle for login/signup and logout */
    .circle-icon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: white;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
    }

    .circle-icon i {
        /* font-size: 16px; */
        color: #821616;
    }

    /* Style for the login/signup and logout buttons */
    .nav-link.btn-outline-danger {
        display: flex;
        align-items: center;
        padding: 5px 10px; /* Adjust padding to make the oval smaller */
        color: white;
        background-color: transparent;
        border: 1px solid white; /* Thinner border */
        border-radius: 30px; /* Adjusted for a smaller oval */
        font-weight: normal; /* No bold text */
        font-size: 16px; /* Match the font size of the other navigation items */
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .nav-link.btn-outline-danger:hover {
        color: white;
        font-weight: bold;
    }

    /* General navigation link styles */
    .navbar .nav-link {
        font-size: 16px; /* Match the font size of the button */
        color: white; /* Ensure consistent text color */
    }

    .social-icons a {
        font-size: 18px;
    }

    .maginia {
        font-family: 'Maginia', serif;
    }

    .navbar .nav-item.dropdown {
        margin-right: 10px; /* Adjust the space between the language dropdown and the button */
    }

    .navbar .nav-link.dropdown-toggle {
        font-size: 16px; /* Match the font size of the other navigation items */
        color: white;
    }

    .navbar .dropdown-menu {
        background-color: #821616; /* Ensure dropdown matches navbar background */
        border: none; /* Optional: Remove border from the dropdown */
    }

    .navbar .dropdown-item {
        color: white;
        font-size: 16px; /* Match dropdown item font size */
        transition: font-weight 0.3s ease; /* Only apply hover effect to font weight */
    }

    .navbar .dropdown-item:hover {
        font-weight: bold;
        background-color: transparent; /* Remove hover background color */
    }
</style>
