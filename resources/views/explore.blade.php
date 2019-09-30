@extends('layouts.app')

@section('title', 'Explore')

@section('content')

    <div class="explore-wrapper">

        <div class="explore-searchbar">
            <input type="text" name="search" id="search-text" class="searchbar-text">
            <input type="submit" value="search" class="searchbar-submit">
        </div>

        <div class="explore-posts">

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/post-placeholder.png')}})">
                    <!--<img src="{{asset('images/post-placeholder.png')}}" alt="post image">-->
                </div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/post_placeholder.png')}})"></div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/featured_placeholder.png')}})"></div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/featured_placeholder_2.png')}})"></div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/featured_placeholder_3.png')}})"></div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/post-placeholder.png')}})">
                    <!--<img src="{{asset('images/post-placeholder.png')}}" alt="post image">-->
                </div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/post_placeholder.png')}})"></div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/featured_placeholder.png')}})"></div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/featured_placeholder_2.png')}})"></div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

            <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                <div class="grid-post-img" style="background-image: url({{asset('images/featured_placeholder_3.png')}})"></div>
                <div class="grid-post-info">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
            </div>

        </div>

    </div>

@endsection
