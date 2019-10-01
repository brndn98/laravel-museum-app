@extends('layouts.landingLayout')

@section('title', 'Sign Up')

@section('content')

    <div class="signup-wrapper">

        <form>
            <h1>Sign Up to MUSEUM :)</h1>
            <div class="form-field">
                <input type="text" name="fullname" class="field-input" placeholder="Type in your full name">
                <p>Full Name</p>
            </div>
            <div class="form-field">
                <input type="email" name="email" class="field-input" placeholder="Enter your E-mail">
                <p>E-Mail</p>
            </div>
            <div class="form-field">
                <input type="text" name="username" class="field-input" placeholder="Create a username">
                <p>Username</p>
            </div>
            <div class="form-field">
                <input type="password" name="password" class="field-input" placeholder="Set a password">
                <p>Password</p>
            </div>
            <div class="form-field">
                <input type="text" name="phone" class="field-input" placeholder="Type in your phone number">
                <p>Phone Number (optional)</p>
            </div>
            <div class="form-field">
                <input type="text" name="address" class="field-input" placeholder="Type in your address">
                <p>Address (optional)</p>
            </div>
            <div class="form-field">
                <textarea name="description" id="form-description" class="form-description" placeholder="Tell us about you..."></textarea>
                <p>Description</p>
            </div>
            <div class="file-field">
                <input type="file" name="file" id="avatar-input" class="file-input" accept="image/*">
                <label for="avatar-input" class="file-label">choose a profile picture</label>
            </div>
            <div class="file-field">
                <input type="file" name="file" id="portrait-input" class="file-input" accept="image/*">
                <label for="portrait-input" class="file-label">choose a portrait picture</label>
            </div>
            <input type="submit" value="sign up" class="form-submit">
        </form>

    </div>

@endsection
