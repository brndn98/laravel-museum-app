@extends('layouts.landingLayout')

@section('title', 'MUSEUM')

@section('content')

    <div class="landing-wrapper">

        @isset($post)
            @if (file_exists(public_path('post/'.$post->file)))
                <div class="featured" style="background-image: url({{secure_asset('post/'.$post->file)}})">
            @else
                <div class="featured" style="background-image: url({{secure_asset('images/featured_placeholder_3.png')}})">
            @endif
                <div class="landing-header">
                    <h1>DESIGN, SHARE, EXPLORE & GET INSPIRED</h1>
                    <p>Welcome to MUSEUM, a community for illustrators and designers. Share, feedback and inspire each other.</p>
                </div>
                <!--Featured illustration-->
                <div class="featured-artist">
                    @if (file_exists(public_path('avatar/'.$post->user->avatar)))
                        <div style="background-image: url({{secure_asset('avatar/'.$post->user->avatar)}})"></div>
                    @else
                        <div style="background-image: url({{secure_asset('images/user_placeholder.png')}})"></div>
                    @endif
                    <p>{{$post->user->username}}</p>
                </div>
            </div>
        @else
            <div class="featured" style="background-image: url({{secure_asset('images/featured_placeholder_3.png')}})">
                <div class="landing-header">
                    <h1>DESIGN, SHARE, EXPLORE & GET INSPIRED</h1>
                    <p>Welcome to MUSEUM, a community for illustrators and designers. Share, feedback and inspire each other.</p>
                </div>
                <div class="featured-artist">
                    <img src="{{secure_asset('images/user_placeholder.png')}}" alt="featuredartist">
                    <p>featuredartist</p>
                </div>
            </div>
        @endisset

        <div class="landing-login">

            <p class="landing-login-logo">MUSEUM</p>

            <form method="GET" action="/loginMuser">
                @csrf
                @if ($errors->any())
                    <p class="landing-login-error">{{$errors->first()}}</p>
                @endif
                <div class="landing-login-field">
                    <p>Username</p>
                    <input type="text" name="username" class="landing-login-input" placeholder="Enter your username">
                </div>
                <div class="landing-login-field">
                    <p>Password</p>
                    <input type="password" name="password" class="landing-login-input" placeholder="Enter your password">
                </div>
                <input type="submit" value="SIGN IN" class="landing-login-submit">

            </form>

            <a href="{{route('register')}}">Or Sign up if you don't have an account.</a>

        </div>

    </div>

@endsection
