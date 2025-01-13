<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('loginform/css/style.css') }}">

</head>

<body class="img js-fullheight" style="background-image: url({{ asset('loginform/images/bg.jpg') }});">
    {{ $slot }}

    <script rel="preload" src="{{ asset('loginform/js/jquery.min.js') }}"></script>
    <script rel="preload" src="{{ asset('loginform/js/popper.js') }}"></script>
    <script rel="preload" src="{{ asset('loginform/js/bootstrap.min.js') }}"></script>
    <script rel="preload" src="{{ asset('loginform/js/main.js') }}"></script>
</body>

</html>
