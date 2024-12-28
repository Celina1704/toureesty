@extends('navbarfooter')
@section('title', 'Log In / Sign Up')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center custom-header">Welcome to Toureesty</div>
                <div class="card-body">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Button to Switch Between Forms -->
                    <div class="text-center mb-3">
                        <button class="btn btn-outline-primary" id="toggleFormButton" onclick="toggleForm()">
                            Switch to Sign Up
                        </button>
                    </div>

                    <!-- Log In Form -->
                    <form id="loginForm" action="{{ route('login') }}" method="POST" class="d-block">
                        @csrf
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" id="loginEmail" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" id="loginPassword" name="password" class="form-control" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100">Log In</button>
                    </form>

                    <!-- Sign Up Form -->
                    <form id="signupForm" action="{{ route('signup') }}" method="POST" class="d-none">
                        @csrf
                        <div class="mb-3">
                            <label for="signupName" class="form-label">Name</label>
                            <input type="text" id="signupName" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="signupEmail" class="form-label">Email</label>
                            <input type="email" id="signupEmail" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="signupPhone" class="form-label">Phone</label>
                            <input type="text" id="signupPhone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="signupBirthday" class="form-label">Birthday</label>
                            <input type="date" id="signupBirthday" name="birthday" class="form-control" value="{{ old('birthday') }}" required>
                            @error('birthday')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="signupGender" class="form-label">Gender</label>
                            <select id="signupGender" name="gender" class="form-control" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="signupPassword" class="form-label">Password</label>
                            <input type="password" id="signupPassword" name="password" class="form-control" required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="signupPasswordConfirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="signupPasswordConfirmation" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-outline-success w-100">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .custom-header {
        font-family: 'Maginia', sans-serif;
        color: #8B0000;
        font-weight: bold;
        font-size: 2rem;
    }
</style>

<script>
    function toggleForm() {
        const loginForm = document.getElementById('loginForm');
        const signupForm = document.getElementById('signupForm');
        const toggleButton = document.getElementById('toggleFormButton');

        if (loginForm.classList.contains('d-block')) {
            loginForm.classList.replace('d-block', 'd-none');
            signupForm.classList.replace('d-none', 'd-block');
            toggleButton.innerText = 'Switch to Log In';
        } else {
            signupForm.classList.replace('d-block', 'd-none');
            loginForm.classList.replace('d-none', 'd-block');
            toggleButton.innerText = 'Switch to Sign Up';
        }
    }
</script>
