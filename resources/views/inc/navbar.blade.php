<nav class="navbar navbar-top" id="navbar-id">

    <div class="navbar-logo">
        <!--<img src="images/logo/VCRANE_iso_white_logo.png" id="navbar-logo-img">-->
    <a href="{{url('/')}}">MUSEUM</a>
    </div>
    <div class="navbar-menu" id="navbar-menu-id">
        <a class="menu-link" href="{{url('/feed')}}">
            <i class="fas fa-home"></i>
            FEED
        </a>
        <a class="menu-link" href="{{url('/explore')}}">
            <i class="fas fa-search"></i>
            EXPLORE
        </a>
        <a class="menu-link menu-post" href="{{url('/share')}}">
            <i class="fas fa-plus-square"></i>
            SHARE
        </a>
        <a class="menu-link menu-account" href="{{url('/account')}}">
            ACCOUNT
            <img src="{{asset('images/user_placeholder.png')}}" alt="current user">
        </a>
    </div>

</nav>
