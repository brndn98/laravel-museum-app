@extends('layouts.museumApp')

@section('title', 'Account')

@section('content')

    <div class="account-wrapper">

        @if (file_exists(public_path('portrait/'.$user->portrait)))
            <div class="account-profile" style="background-image: url({{secure_asset('portrait/'.$user->portrait)}})">
        @else
            <div class="account-profile" style="background-image: url({{secure_asset('images/post-placeholder.png')}})">
        @endif

            <span class="profile-portrait"></span>

            @if (file_exists(public_path('avatar/'.$user->avatar)))
                <div class="profile-avatar" style="background-image: url({{secure_asset('avatar/'.$user->avatar)}})"></div>
            @else
                <div class="profile-avatar" style="background-image: url({{secure_asset('images/user_placeholder.png')}})"></div>
            @endif
            <h1>{{$user->username}}</h1>
            @auth
                @if (Auth::user()->id != $user->id)
                    @if (Auth::user()->following->contains($user))
                        <a href="{{url('unfollow/'.$user->id)}}">unfollow</a>
                    @else
                        <a href="{{url('follow/'.$user->id)}}">follow</a>
                    @endif
                @endif
            @endauth
            <p>{{$user->name}} <br><br> {{$user->description}}</p>
            <div class="profile-status">
                <p>{{$user->posts->count()}} posts</p>
                <p>{{$user->followers->count()}} followers</p>
                @php
                    $postsLiked = 0;
                    foreach ($user->posts as $post) {
                        $postsLiked += $post->liked->count();
                    }
                @endphp
                <p>{{$postsLiked}} likes</p>
                <p>{{$user->comments->count()}} comments</p>
            </div>

            @auth
                @can('admin-users')
                    @if (Auth::user()->id != $user->id)
                        <div class="profile-options admin-options">
                        @foreach ($user->roles as $role)
                            @if ($role->name == 'admin')
                                <a class="profile-option admin-option" href="{{url('makeMod/'.$user->username)}}">make mod</a>
                            @elseif($role->name == 'mod')
                                <a class="profile-option admin-option" href="{{url('makeAdmin/'.$user->username)}}">make admin</a>
                            @else
                                <a class="profile-option admin-option" href="{{url('makeAdmin/'.$user->username)}}">make admin</a>
                                <a class="profile-option admin-option" href="{{url('makeMod/'.$user->username)}}">make mod</a>
                            @endif
                        @endforeach
                        </div>
                    @endif
                @endcan
                <div class="profile-options user-options">
                    @if (Auth::user()->id == $user->id)
                        <a class="profile-option" href="{{route('users.edit', $user->username)}}">edit profile</a>
                        <form action="{{route('users.destroy', $user->username)}}" method="POST">
                            @method('delete')
                            @csrf
                            <input class="profile-option profile-delete" type="submit" value="delete account">
                        </form>
                        <a class="profile-option profile-logout" href="{{url('logoutMuser')}}">log out</a>
                    @else
                        @can('admin-users')
                            <form action="{{route('users.destroy', $user->username)}}" method="POST">
                                @method('delete')
                                @csrf
                                <input class="profile-option profile-delete" type="submit" value="delete user">
                            </form>
                        @endcan
                    @endif
                </div>
            @endauth

        </div>

        <div class="account-gallery">

            @auth
                @if (Auth::user()->id == $user->id)
                    <h1>your posts</h1>
                @else
                    <h1>posts by {{$user->username}}</h1>
                @endif
            @endauth
            @guest
                <h1>posts by {{$user->username}}</h1>
            @endguest

            <div class="gallery-posts">

                @foreach ($user->posts->reverse() as $post)
                    <div class="grid-post">
                        @if (file_exists(public_path('post/'.$post->file)))
                            <div class="grid-post-img" style="background-image: url({{secure_asset('post/'.$post->file)}})" onclick="window.location='{{ route('posts.show', $post->id) }}'"></div>
                        @else
                            <div class="grid-post-img" style="background-image: url({{secure_asset('images/post-placeholder.png')}})" onclick="window.location='{{ route('posts.show', $post->id) }}'"></div>
                        @endif
                        <div class="grid-post-info">
                            @auth
                                @if (Auth::user()->likes->contains($post))
                                    <i id="{{$post->id}}" class="fas fa-heart grid-post-icons grid-post-actions-active"></i>
                                @else
                                    <i id="{{$post->id}}" class="fas fa-heart grid-post-icons grid-post-actions"></i>
                                @endif
                            @endauth
                            @guest
                                <i id="{{$post->id}}" class="fas fa-heart grid-post-icons grid-post-actions"></i>
                            @endguest
                            <p id="post-likes-count-{{$post->id}}">{{$post->liked->count()}} likes</p>
                            <i class="fas fa-comment grid-post-actions"></i>
                            <p>{{$post->commenters->count()}} comments</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </div>

@endsection
