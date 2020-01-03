@extends('layouts.landingLayout')

@section('title', 'Sign Up')

@section('content')

    <img src="{{secure_asset('avatar/'.$muser->avatar)}}" alt="{{$muser->username}} avatar" style="width: 100px; height: 100px;">
    <h1>{{$muser->fullname}}</h1>
    <p>{{$muser->username}}</p>
    <a href="{{url('musers/'.$muser->username.'/edit')}}">Edit muser</a>

@endsection
