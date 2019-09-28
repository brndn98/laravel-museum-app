@extends('layouts.app')

@section('title', 'MUSEUM | Feed')

@section('content')

    <div class="feed-wrapper">

        <div class="feed-content">

            <div class="feed-post">
                <div class="feed-post-img">
                    <img src="{{secure_asset('images/post-placeholder.png')}}" alt="post image">
                </div>
                <div class="feed-post-info">
                    <div class="post-artist">
                        <img src="{{secure_asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <div class="post-actions">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>
            </div>

            <div class="feed-post">
                <div class="feed-post-img">
                    <img src="{{secure_asset('images/post-placeholder.png')}}" alt="post image">
                </div>
                <div class="feed-post-info">
                    <div class="post-artist">
                        <img src="{{secure_asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <div class="post-actions">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>
            </div>

            <div class="feed-post">
                <div class="feed-post-img">
                    <img src="{{secure_asset('images/post-placeholder.png')}}" alt="post image">
                </div>
                <div class="feed-post-info">
                    <div class="post-artist">
                        <img src="{{secure_asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <div class="post-actions">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>
            </div>

            <div class="feed-post">
                <div class="feed-post-img">
                    <img src="{{secure_asset('images/post-placeholder.png')}}" alt="post image">
                </div>
                <div class="feed-post-info">
                    <div class="post-artist">
                        <img src="{{secure_asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <div class="post-actions">
                        <i class="fas fa-heart"></i>
                        <p>0 likes</p>
                        <i class="fas fa-comment"></i>
                        <p>0 comments</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="feed-tags">
            <h1>popular tags</h1>
            <div class="feed-tags-list">
                <p>3D Model</p>
                <p>Pixel Art</p>
                <p>Voxel Art</p>
                <p>Web Design</p>
                <p>Traditional Art</p>
            </div>
        </div>

    </div>

@endsection
