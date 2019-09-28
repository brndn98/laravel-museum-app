<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{secure_asset('https://use.fontawesome.com/releases/v5.7.2/css/all.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{secure_asset('css/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>

    <div class="wrapper">

        @include('inc.navbar')

        @yield('content')

        @include('inc.footer')

    </div>

    <script src="{{secure_asset('js/script.js')}}"></script>

</body>
</html>