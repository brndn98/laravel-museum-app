@extends('layouts.app')

@section('title', 'Post')

@section('content')

    <div class="post-wrapper">

        <div class="post-img">
            <img src="{{asset('images/post_placeholder.png')}}" alt="post placeholder">
        </div>

        <div class="post-content">

            <div class="post-info">
                <div class="post-artist">
                    <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                    <a href="{{url('/account')}}">username</a>
                </div>
                <div class="post-actions">
                    <i class="fas fa-heart"></i>
                    <p>0 likes</p>
                    <i class="fas fa-comment"></i>
                    <p>0 comments</p>
                </div>
            </div>

            <div class="post-comments">

                <div class="post-comment">
                    <div class="comment-author">
                        <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <p class="comment-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam aliquam explicabo reprehenderit fugit! Ipsam dolore tenetur omnis labore atque eos deserunt itaque reiciendis cupiditate qui. Quia numquam voluptatibus culpa neque. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam aliquam explicabo reprehenderit fugit! Ipsam dolore tenetur omnis labore atque eos deserunt itaque reiciendis cupiditate qui. Quia numquam voluptatibus culpa neque.
                    </p>
                </div>

                <div class="post-comment">
                    <div class="comment-author">
                        <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <p class="comment-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam aliquam explicabo reprehenderit fugit! Ipsam dolore tenetur omnis labore atque eos deserunt itaque reiciendis cupiditate qui. Quia numquam voluptatibus culpa neque.
                    </p>
                </div>

                <div class="post-comment">
                    <div class="comment-author">
                        <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <p class="comment-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam aliquam explicabo reprehenderit fugit! Ipsam dolore tenetur omnis labore atque eos deserunt itaque reiciendis cupiditate qui. Quia numquam voluptatibus culpa neque.
                    </p>
                </div>

                <div class="post-comment">
                    <div class="comment-author">
                        <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <p class="comment-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam aliquam explicabo reprehenderit fugit! Ipsam dolore tenetur omnis labore atque eos deserunt itaque reiciendis cupiditate qui. Quia numquam voluptatibus culpa neque. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam aliquam explicabo reprehenderit fugit! Ipsam dolore tenetur omnis labore atque eos deserunt itaque reiciendis cupiditate qui. Quia numquam voluptatibus culpa neque.
                    </p>
                </div>

                <div class="post-comment">
                    <div class="comment-author">
                        <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <p class="comment-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam aliquam explicabo reprehenderit fugit! Ipsam dolore tenetur omnis labore atque eos deserunt itaque reiciendis cupiditate qui. Quia numquam voluptatibus culpa neque.
                    </p>
                </div>

                <div class="post-comment">
                    <div class="comment-author">
                        <img src="{{asset('images/user_placeholder.png')}}" alt="user avatar">
                        <p>username</p>
                    </div>
                    <p class="comment-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam aliquam explicabo reprehenderit fugit! Ipsam dolore tenetur omnis labore atque eos deserunt itaque reiciendis cupiditate qui. Quia numquam voluptatibus culpa neque.
                    </p>
                </div>


            </div>

        </div>

    </div>

@endsection
