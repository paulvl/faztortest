<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wonderland | Regalos unicos e inolvidables</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Merriweather:400,400italic' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Theme stylesheet -->
    <link href="{{ asset('css/style.red.css') }}" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <script src="{{ asset('js/respond.min.js') }}"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <!-- owl carousel css -->

    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
</head>

<body>

    @yield("body")

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>



    <!-- owl carousel -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
</body>

</html>