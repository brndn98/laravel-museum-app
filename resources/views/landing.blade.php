@extends('layouts.landingLayout')

@section('title', 'MUSEUM')

@section('content')

    <div class="landing-wrapper">

        <div class="featured" style="background-image: url({{asset('post/'.$post->file)}})">

            <div class="landing-header">
                <h1>DESIGN, SHARE, EXPLORE & GET INSPIRED</h1>
                <p>Welcome to MUSEUM, a community for illustrators and designers. Share, feedback and inspire each other.</p>
            </div>

            <!--Featured illustration-->
            <div class="featured-artist">
                <img src="{{asset('avatar/'.$post->user->avatar)}}" alt="{{$post->user->username}}">
                <p>{{$post->user->username}}</p>
            </div>

        </div>

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
