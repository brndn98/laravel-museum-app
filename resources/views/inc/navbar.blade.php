<nav class="navbar navbar-top" id="navbar-id">

    <div class="navbar-logo">
        <!--<img src="images/logo/VCRANE_iso_white_logo.png" id="navbar-logo-img">-->
    <a href="{{url('/')}}">MUSEUM</a>
    </div>
    <div class="navbar-menu" id="navbar-menu-id">
        <a class="menu-link" href="{{url('/')}}">
            <i class="fas fa-home"></i>
            FEED
        </a>
        <a class="menu-link" href="{{route('posts.index')}}">
            <i class="fas fa-search"></i>
            EXPLORE
        </a>
        <a class="menu-link menu-post" href="{{route('posts.create')}}">
            <i class="fas fa-plus-square"></i>
            SHARE
        </a>
        @auth
            <a class="menu-link menu-account" href="{{route('users.show', Auth::user()->username)}}">
                <p style="text-transform: uppercase">{{ Auth::user()->username }}</p>
                @if (file_exists(public_path('avatar/'.Auth::user()->avatar)))
                    <div style="background-image: url({{secure_asset('avatar/'.Auth::user()->avatar)}})"></div>
                @else
                    <div style="background-image: url({{secure_asset('images/user_placeholder.png')}})"></div>
                @endif
            </a>
        @else
            <a class="menu-link menu-account" href="{{url('/')}}">
                ACCOUNT
                <img src="{{secure_asset('images/user_placeholder.png')}}" alt="current user">
            </a>
        @endauth
    </div>

</nav>
