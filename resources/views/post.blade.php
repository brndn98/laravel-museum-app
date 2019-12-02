@extends('layouts.museumApp')

@section('title', 'Post')

@section('content')

    <div class="post-wrapper">

        <div class="post-img">
            <img src="{{secure_asset('public/post/'.$post->file)}}" alt="{{$post->title}}">
            @auth
                @if (Auth::user()->id == $post->user->id)
                    <a class="post-option" href="{{route('posts.edit', $post->id)}}">modify post</a>
                @endif
            @endauth
        </div>

        <div class="post-content">

            <div class="post-info">
                <div class="post-title">
                    <h1>{{$post->title}}</h1>
                    <div class="post-tags">
                        <p>{{ $post->tags->pluck('name')->implode(', ') }}</p>
                    </div>
                </div>
                <div class="post-artist new-post-artist">
                    <div style="background-image: url({{secure_asset('public/avatar/'.$post->user->avatar)}})"></div>
                    <a href="{{route('users.show', $post->user->username)}}">{{$post->user->username}}</a>
                </div>
                <div class="post-actions new-post-actions">
                    @auth
                        @if (Auth::user()->likes->contains($post))
                            <i id="{{$post->id}}" class="fas fa-heart post-likes-active"></i>
                        @else
                            <i id="{{$post->id}}" class="fas fa-heart post-likes"></i>
                        @endif
                    @endauth
                    @guest
                        <i id="{{$post->id}}" class="fas fa-heart post-likes"></i>
                    @endguest
                    <p id="post-likes-count-{{$post->id}}">{{$post->liked->count()}} likes</p>
                    <i class="fas fa-comment post-actions-comments"></i>
                    <p>{{$post->commenters->count()}} comments</p>
                </div>
            </div>

            @auth
                <div class="post-comments-auth">
            @else
                <div class="post-comments">
            @endauth

            @foreach ($post->commenters as $commenter)
                <div class="post-comment">
                    <div class="comment-author">
                        <div style="background-image: url({{secure_asset('public/avatar/'.$commenter->avatar)}})"></div>
                        <a href="{{route('users.show', $commenter->username)}}">{{$commenter->username}}</a>
                    </div>
                    <p class="comment-text">
                        {{$commenter->pivot->text}}
                    </p>
                </div>
            @endforeach

            </div>

            @auth
                <div class="user-comment">
                    <form method="POST" action="{{route('comments.store')}}" class="comment-form">
                        @csrf
                        <input name="post" type="hidden" value="{{$post->id}}">
                        <div class="comment-avatar" style="background-image: url({{secure_asset('public/avatar/'.Auth::user()->avatar)}})"></div>
                        <input type="text" name="text" id="comment-text" class="comment-input" placeholder="Write a comment..." autocomplete="off">
                        <input type="submit" value="send" class="comment-submit">
                    </form>
                </div>
            @endauth

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
