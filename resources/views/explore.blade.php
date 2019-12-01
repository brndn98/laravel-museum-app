@extends('layouts.museumApp')

@section('title', 'Explore')

@section('content')

    <div class="explore-wrapper">

        <form method="GET" action="{{url('/explorePosts')}}" class="explore-searchbar">
            <input type="text" name="search" id="search-text" class="searchbar-text" placeholder="Search for a post...">
            <input type="submit" value="search" class="searchbar-submit">
        </form>

        <div class="explore-posts">

            @forelse ($posts as $post)

                <div class="grid-post" onclick="window.location='{{ route('posts.show', $post->id) }}'">
                    <div class="grid-post-img" style="background-image: url({{asset('post/'.$post->file)}})"></div>
                    <div class="grid-post-info">
                        <div style="background-image: url({{asset('avatar/'.$post->user->avatar)}})"></div>
                        <a class="grid-post-account" href="{{route('users.show', $post->user->username)}}">{{$post->user->username}}</a>
                    </div>
                </div>

            @empty

                <div class="explore-empty">
                    <h1>there are no results :(</h1>
                </div>

            @endforelse

        </div>

    </div>

@endsection
