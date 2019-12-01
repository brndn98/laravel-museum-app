@extends('layouts.landingLayout')

@section('title', 'Sign Up')

@section('content')

    @foreach ($musers as $muser)
        <img src="{{asset('avatar/'.$muser->avatar)}}" alt="{{$muser->username}} avatar" style="width: 100px; height: 100px;">
        <h1>{{$muser->fullname}}</h1>
        <p>{{$muser->username}}</p>
        <a href="{{url('musers/'.$muser->username)}}">Show muser</a>
    @endforeach

@endsection
