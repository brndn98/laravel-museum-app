@extends('layouts.landingLayout')

@section('title', 'Sign Up')

@section('content')

    <div class="signup-wrapper">

        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <h1>Sign Up to MUSEUM :)</h1>

            <div class="form-field">
                <input type="text" name="name" class="field-input @error('name') input-error @enderror" placeholder="Type in your full name" value="{{old('name')}}">
                @error('name')
                    <p>Full Name <span class="form-error-alert">{{$message}}</span></p>
                @else
                    <p>Full Name</p>
                @enderror
            </div>
            <div class="form-field">
                <input type="email" name="email" class="field-input @error('email') input-error @enderror" placeholder="Enter your E-mail" value="{{old('email')}}">
                @error('email')
                    <p>E-Mail <span class="form-error-alert">{{$message}}</span></p>
                @else
                    <p>E-Mail</p>
                @enderror
            </div>
            <div class="form-field">
                <input type="text" name="username" class="field-input @error('username') input-error @enderror" placeholder="Create a username" value="{{old('username')}}">
                @error('username')
                    <p>Username <span class="form-error-alert">{{$message}}</span></p>
                @else
                    <p>Username <span class="form-field-rules">(more than 8 characters, and all lowercase)</span></p>
                @enderror
            </div>
            <div class="form-field">
                <input type="password" name="password" class="field-input @error('password') input-error @enderror" placeholder="Set a password">
                @error('password')
                    <p>Password <span class="form-error-alert">{{$message}}</span></p>
                @else
                    <p>Password <span class="form-field-rules">(more than 8 characters)</span></p>
                @enderror
            </div>
            <div class="form-field">
                <input type="text" name="phone" class="field-input" placeholder="Type in your phone number" value="{{old('phone')}}">
                <p>Phone Number <span class="form-field-rules">(optional)</span></p>
            </div>
            <div class="form-field">
                <input type="text" name="address" class="field-input" placeholder="Type in your address" value="{{old('address')}}">
                <p>Address <span class="form-field-rules">(optional)</span></p>
            </div>
            <div class="form-field">
                <textarea name="description" id="form-description" class="field-textarea @error('description') input-error @enderror" placeholder="Tell us about you..." maxlength="100">{{old('description')}}</textarea>
                @error('description')
                    <span class="form-error-alert">{{$message}}</span>
                @enderror
                <p>Description <span class="form-field-rules">(up to 100 characters)</span></p>
            </div>
            @error('avatar')
                <p class="form-error-alert">{{$message}}</p>
            @enderror
            <div class="file-field">
                <input type="file" name="avatar" id="avatar-input" class="file-input" accept="image/*">
                <label for="avatar-input" class="file-label">pick profile avatar</label>
            </div>
            @error('portrait')
                <p class="form-error-alert">{{$message}}</p>
            @enderror
            <div class="file-field">
                <input type="file" name="portrait" id="portrait-input" class="file-input" accept="image/*">
                <label for="portrait-input" class="file-label">pick profile background</label>
            </div>
            <input type="submit" value="sign up" class="form-submit">
        </form>

    </div>

@endsection
