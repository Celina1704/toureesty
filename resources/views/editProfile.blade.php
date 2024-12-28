@extends('navbarfooter')
@section('title', 'Edit Profile')

@section('content')
<style>
    .row .buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
    }
    .error-message {
        color: red;
        font-size: 0.875rem;
        margin-top: -10px;
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <h2 style="font-family: maginia; color: #821616; text-align: center;" class="mt-5"><b>Update Profile</b></h2>
    <form action="{{ url('profile/updateProfile/'.$profile->id) }}" method="POST">
        @csrf
        <div class="row m-5">
            <div class="col-2"></div>
            <div class="col-2">
                <label for="name" class="form-label mt-1">Full Name</label><br><br>
                <label for="phone" class="form-label mt-1">Phone Number</label><br><br>
                <label for="email" class="form-label mt-1">Email</label><br><br>
                <label for="birthday" class="form-label mt-1">Birthday</label><br><br>
                <label for="signupGender" class="form-label mt-1">Gender</label><br><br>
            </div>
            <div class="col-7">
                <input class="form-control" type="text" name="name" id="name" placeholder="{{ $profile->name }}" value="{{ old('name', $profile->name) }}">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <br>

                <input class="form-control" type="text" name="phone" id="phone" placeholder="{{ $profile->phone }}" value="{{ old('phone', $profile->phone) }}">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <br>

                <input class="form-control" type="text" name="email" id="email" placeholder="{{ $profile->email }}" value="{{ old('email', $profile->email) }}">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <br>

                <input class="form-control" type="date" name="birthday" id="birthday" value="{{ old('birthday', $profile->birthday) }}">
                @error('birthday')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <br>

                <select id="signupGender" name="gender" class="form-control">
                    <option value="" disabled {{ old('gender', $profile->gender) == '' ? 'selected' : '' }}>Select Gender</option>
                    <option value="Male" {{ old('gender', $profile->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $profile->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender', $profile->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="buttons mb-5">
                <button class="btn px-5" style="background-color: lightgray;">
                    <b><a href="{{ url('profile/'.$profile->id) }}" style="color: black; text-decoration: none;">Cancel</a></b>
                </button>
                <button type="submit" class="btn px-5" style="background-color: #821616; color: white;"><b>Save</b></button>
            </div>
        </div>
    </form>
</div>
@endsection
