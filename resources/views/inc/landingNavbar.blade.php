<nav class="navbar navbar-top" id="navbar-id">

    <div class="navbar-logo">
        <!--<img src="images/logo/VCRANE_iso_white_logo.png" id="navbar-logo-img">-->
        <a href="{{url('/')}}">MUSEUM</a>
    </div>
    <div class="navbar-menu landing-menu" id="navbar-menu-id">
        <a class="landing-menu-link" href="{{route('posts.index')}}">EXPLORE</a>
        <a class="landing-menu-link" href="{{url('/')}}">SIGN IN</a>
        <a class="landing-menu-link landing-signup" href="{{ route('register') }}">SIGN UP</a>
    </div>

</nav>
