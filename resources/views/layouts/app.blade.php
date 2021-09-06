<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ministere</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/min.css') }}">
</head>

<body>
    <div class="contai">
        <div class="tete">
            <nav style="margin: 10px 30px 20px;">
                <div class="nav-left">
                    <img src="{{ asset('images/banner.png') }}" width="100%" height="10%">
                </div>
            </nav>
        </div>
        <div class="form" style="margin: 10px 50px 20px;  box-shadow: 2px 2px 2px 2px #888888;">
            @yield('content')
        </div>
        <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            @yield('modal')
        </div>
        <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
