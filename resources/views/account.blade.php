@extends('layouts.app')

@section('title', 'Account')

@section('content')

    <div class="account-wrapper">

        <div class="account-profile">

            <img src="{{secure_asset('images/user_placeholder.png')}}" alt="user avatar">
            <h1>username</h1>
            <a href="#follow">follow</a>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti corrupti enim, vel quidem ut aliquid. Amet, ut aut officiis soluta earum similique beatae quae voluptates quibusdam consequatur libero illum sequi.</p>
            <div class="profile-status">
                <p>0 posts</p>
                <p>0 followers</p>
                <p>0 likes</p>
                <p>0 comments</p>
            </div>

        </div>

        <div class="account-gallery">

            <div class="gallery-posts">

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/post-placeholder.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/post_placeholder.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/featured_placeholder.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/featured_placeholder_2.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/featured_placeholder_3.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/post-placeholder.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/post_placeholder.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/featured_placeholder.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/featured_placeholder_2.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

                <div class="grid-post" onclick="window.location='{{ url('/post') }}'">
                    <div class="grid-post-img" style="background-image: url({{secure_asset('images/featured_placeholder_3.png')}})"></div>
                    <div class="grid-post-info">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
