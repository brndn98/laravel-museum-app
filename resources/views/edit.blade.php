@extends('layouts.museumApp')

@section('title', 'Edit Profile')

@section('content')

    <div class="signup-wrapper">

        <form method="POST" action="{{route('users.update', $user->username)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <h1>Editing Profile</h1>

            <div class="form-field">
                <input type="text" name="name" class="field-input @error('name') input-error @enderror" placeholder="Type in your full name" value="{{$user->name}}">
                @error('name')
                    <p>Full Name <span class="form-error-alert">{{$message}}</span></p>
                @else
                    <p>Full Name</p>
                @enderror
            </div>
            <div class="form-field">
                <input type="email" name="email" class="field-input field-input-disabled" value="{{$user->email}}" disabled>
                <p>E-Mail</p>
            </div>
            <div class="form-field">
                <input type="text" name="username" class="field-input field-input-disabled" value="{{$user->username}}" disabled>
                <p>Username</p>
            </div>
            <div class="form-field">
                <input type="text" name="phone" class="field-input" placeholder="Type in your phone number" value="{{$user->phone}}">
                <p>Phone Number <span class="form-field-rules">(optional)</span></p>
            </div>
            <div class="form-field">
                <input type="text" name="address" class="field-input" placeholder="Type in your address" value="{{$user->address}}">
                <p>Address <span class="form-field-rules">(optional)</span></p>
            </div>
            <div class="form-field">
                <textarea name="description" id="form-description" class="field-textarea @error('description') input-error @enderror" placeholder="Tell us about you..." maxlength="100">{{$user->description}}</textarea>
                @error('description')
                    <span class="form-error-alert">{{$message}}</span>
                @enderror
                <p>Description <span class="form-field-rules">(up to 100 characters)</span></p>
            </div>
            <div class="file-preview" style="background-image: url({{asset('avatar/'.$user->avatar)}})"></div>
            <div class="file-field">
                <input type="file" name="avatar" id="avatar-input" class="file-input" accept="image/*">
                <label for="avatar-input" class="file-label">change profile avatar</label>
            </div>
            <div class="file-preview" style="background-image: url({{asset('portrait/'.$user->portrait)}})"></div>
            <div class="file-field">
                <input type="file" name="portrait" id="portrait-input" class="file-input" accept="image/*">
                <label for="portrait-input" class="file-label">change profile background</label>
            </div>
            <input type="submit" value="update profile" class="form-submit">
        </form>

    </div>

@endsection
