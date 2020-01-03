@extends('layouts.museumApp')

@section('title', 'Account')

@section('content')

    <div class="account-wrapper">

        <div class="account-profile" style="background-image: url({{secure_asset('portrait/'.$user->portrait)}})">

            <span class="profile-portrait"></span>

            <div class="profile-avatar" style="background-image: url({{secure_asset('avatar/'.$user->avatar)}})"></div>
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
                        <div class="grid-post-img" style="background-image: url({{secure_asset('post/'.$post->file)}})" onclick="window.location='{{ route('posts.show', $post->id) }}'"></div>
                        <div class="grid-post-info">
                            @auth
                                @if (Auth::user()->likes->contains($post))
                                    <i id="{{$post->id}}" class="fas fa-heart grid-post-actions-active"></i>
                                @else
                                    <i id="{{$post->id}}" class="fas fa-heart grid-post-actions"></i>
                                @endif
                            @endauth
                            @guest
                                <i id="{{$post->id}}" class="fas fa-heart grid-post-actions"></i>
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

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".fa-heart").click(function(e){
            e.preventDefault();

            var post_id = this.id;
            var thisPost = this;
            var thisPostId = 'post-likes-count-' + this.id;
            var thisLikes = document.getElementById(thisPostId);
            var likesCount = thisLikes.innerText.replace(/\D+/g, '');

            $.ajax({
                type:'POST',
                url:'/ajaxRequest',
                data:{post_id:post_id},

                success:function(data){
                    if(data.success === "liked"){
                        thisPost.classList.add('grid-post-actions-active');
                        thisPost.classList.remove('grid-post-actions');
                        thisLikes.innerText = (1 + +likesCount) + ' likes';
                    } else if(data.success === "disliked"){
                        thisPost.classList.add('grid-post-actions');
                        thisPost.classList.remove('grid-post-actions-active');
                        thisLikes.innerText = (likesCount - 1) + ' likes';
                    }
                }
            });
        });
    </script>

@endsection
