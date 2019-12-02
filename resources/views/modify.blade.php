@extends('layouts.museumApp')

@section('title', 'New post')

@section('content')

    <div class="share-wrapper">

        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <h1>Edit your post</h1>
            <div class="file-preview" style="background-image: url({{secure_asset('public/post/'.$post->file)}})"></div>
            <div class="file-field">
                <input type="file" name="file" id="file-input" class="file-input" accept="image/*">
                <label for="file-input" class="file-label">Change file</label>
            </div>
            <div class="form-field">
                <input type="text" name="title" id="file-title" class="file-title field-input" placeholder="Choose a title" value="{{$post->title}}">
                <p>Title</p>
            </div>
            <div class="form-field">
                <textarea name="description" id="form-description" class="field-textarea" placeholder="Write a description..." maxlength="100">{{$post->description}}</textarea>
                <p>Description</p>
            </div>
            <div class="form-field">
                <div class="form-checkbox-fieldset">
                    @foreach ($tags as $tag)
                        <div class="form-checkbox">
                        <input type="checkbox" name="tags[]" class="checkbox-input" id="{{$tag->id}}" value="{{$tag->id}}"
                        @if($post->tags->contains($tag)) checked @endif>
                            <i class="fas fa-check-square checkbox-checked"></i>
                            <i class="far fa-square"></i>
                            <label for="{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                    @endforeach
                </div>
                <p>Select tags</p>
            </div>
            <input type="submit" value="update post" class="share-submit form-submit">
        </form>

    </div>

@endsection
