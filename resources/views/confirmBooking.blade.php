@extends('navbarfooter')
@section('title', 'Booking Confirmed')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    .info-container{
        margin:10%;
        padding:20px;
        background-color:#EAEAEA;
        position: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .info-container h2{
        color: #821616
    }

    .info-container img{
        height: 200px;
        padding: 20px;
    }
</style>

<body>
    <div class="container">
        <div class = "info-container">
            <h2>Payment Successful</h2>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Eo_circle_green_white_checkmark.svg/800px-Eo_circle_green_white_checkmark.svg.png?20200417133735" alt="">
            <p><strong>Thank You</strong></p>
        </div>

        <div class="button-container">
            <div class="hehe" style="height: 100px; text-align: center; color: #821616; padding:10px">
                <a href="{{ url('profile/'.$user_id) }}" class="btn" style="background-color: #821616; font-size:24px; color: #fff; padding:10px 100px">OK</a>
            </div>
        </div>
    </div>

</body>
</html>

@endsection
