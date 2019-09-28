@extends('layouts.landingLayout')

@section('title', 'MUSEUM')

@section('content')

    <div class="landing-wrapper">

        <div class="featured" style="background-image: url({{secure_asset('images/featured_placeholder_3.png')}})">

            <div class="landing-header">
                <h1>DESIGN, SHARE, EXPLORE & GET INSPIRED</h1>
                <p>Welcome to MUSEUM, a community for illustrators and designers. Share, feedback and inspire each other.</p>
            </div>

            <!--Featured illustration-->
            <div class="featured-artist">
                <img src="{{secure_asset('images/user_placeholder.png')}}" alt="featured user">
                <p>featuredUser</p>
            </div>

        </div>

        <div class="landing-login">

            <p class="landing-login-logo">MUSEUM</p>

            <form>

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

            <a href="#signup">Or Sign up if you don't have an account.</a>

        </div>

    </div>

@endsection
