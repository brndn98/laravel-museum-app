@extends('layouts.museumApp')

@section('title', 'Feed')

@section('content')

    <div class="feed-wrapper">

        <div class="feed-options">
            @isset($type)
                @if($type == 'recent')
                    <a class="feed-option feed-option-active" href="{{url('recentPosts')}}">recent posts</a>
                    <a class="feed-option" href="{{url('followingPosts')}}">following</a>
                    <a class="feed-option" href="{{url('popularPosts')}}">popular</a>
                @elseif($type == 'following')
                    @auth
                        <a class="feed-option" href="{{url('recentPosts')}}">recent posts</a>
                        <a class="feed-option feed-option-active" href="{{url('followingPosts')}}">following</a>
                        <a class="feed-option" href="{{url('popularPosts')}}">popular</a>
                    @endauth
                @else
                    <a class="feed-option" href="{{url('recentPosts')}}">recent posts</a>
                    <a class="feed-option" href="{{url('followingPosts')}}">following</a>
                    <a class="feed-option feed-option-active" href="{{url('popularPosts')}}">popular</a>
                @endif
            @endisset
        </div>

        <div class="feed-content">

            @isset($type)
                @foreach ($posts as $post)
                    <div class="feed-post">
                        <div class="feed-post-img" onclick="window.location='{{ route('posts.show', $post->id) }}'">
                            <img src="{{secure_asset('post/'.$post->file)}}" alt="{{$post->title}}">
                        </div>
                        <div class="feed-post-info">
                            <div class="post-artist">
                                <div style="background-image: url({{secure_asset('avatar/'.$post->user->avatar)}})"></div>
                                <a href="{{route('users.show', $post->user->username)}}">{{$post->user->username}}</a>
                            </div>
                            <div class="post-actions">
                                @if (Auth::user()->likes->contains($post))
                                    <i id="{{$post->id}}" class="fas fa-heart post-likes-active"></i>
                                @else
                                    <i id="{{$post->id}}" class="fas fa-heart post-likes"></i>
                                @endif
                                <p id="post-likes-count-{{$post->id}}">{{$post->liked->count()}} likes</p>
                                <i class="fas fa-comment post-actions-comments"></i>
                                <p>{{$post->commenters->count()}} comments</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>

        <div class="feed-tags">
            <h1>popular tags</h1>
            <div class="feed-tags-list">
                @foreach ($tags as $tag)
                    <a href="{{url('categories/'.$tag->id)}}">{{$tag->name}}</a>
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
                        thisPost.classList.add('post-likes-active');
                        thisPost.classList.remove('post-likes');
                        thisLikes.innerText = (1 + +likesCount) + ' likes';
                    } else if(data.success === "disliked"){
                        thisPost.classList.add('post-likes');
                        thisPost.classList.remove('post-likes-active');
                        thisLikes.innerText = (likesCount - 1) + ' likes';
                    }
                }
            });
        });
    </script>

@endsection
