@extends('navbarfooter')
@section('title', 'Edit Profile')

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

<style>
    .row .buttons{
        display: flex;
        justify-content: center;
        gap: 20px;
    }
</style>

<body>
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
                    <input class="form-control" type="text" name="name" id="name" placeholder="{{ $profile->name }}"><br>
                    <input class="form-control" type="text" name="phone" id="phone" placeholder="{{ $profile->phone }}"><br>
                    <input class="form-control" type="text" name="email" id="email" placeholder="{{ $profile->email }}"><br>
                    <input class="form-control" type="date" name="birthday" id="birthday" placeholder="{{ $profile->birthday }}"><br>
                    <select id="signupGender" name="gender" class="form-control">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="buttons mb-5">
                    <button class="btn px-5" style="background-color: lightgray;"><b><a href="{{ url('profile/'.$profile->id) }}" style="color: black; text-decoration: none;">Cancel</a></b></button>
                    <button type="submit" class="btn px-5" style="background-color: #821616; color: white;"><b>Save</b></button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

@endsection
