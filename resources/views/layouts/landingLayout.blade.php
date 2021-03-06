<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{secure_asset('css/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>

    <div class="wrapper">

        @include('inc.landingNavbar')

        @yield('content')

        @include('inc.footer')

    </div>

    <script src="{{secure_asset('js/script.js')}}"></script>

</body>
</html>
