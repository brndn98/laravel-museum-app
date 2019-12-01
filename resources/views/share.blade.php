@extends('layouts.museumApp')

@section('title', 'New post')

@section('content')

    <div class="share-wrapper">

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <h1>Add a new post to your gallery</h1>
            <div class="file-field">
                <input type="file" name="file" id="file-input" class="file-input" accept="image/*">
                <label for="file-input" class="file-label">Upload a file</label>
            </div>
            <div class="form-field">
                <input type="text" name="title" id="file-title" class="file-title field-input" placeholder="Choose a title">
                <p>Title</p>
            </div>
            <div class="form-field">
                <textarea name="description" id="form-description" class="field-textarea" placeholder="Write a description..." maxlength="100"></textarea>
                <p>Description</p>
            </div>
            <div class="form-field">
                <!--<fieldset>-->
                <div class="form-checkbox-fieldset">
                    @foreach ($tags as $tag)
                        <div class="form-checkbox">
                        <input type="checkbox" name="tags[]" class="checkbox-input" id="{{$tag->id}}" value="{{$tag->id}}">
                            <i class="fas fa-check-square checkbox-checked"></i>
                            <i class="far fa-square"></i>
                            <label for="{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                    @endforeach
                </div>
                <!--</fieldset>-->
                <p>Select tags</p>
            </div>
            <input type="submit" value="share post" class="share-submit form-submit">
        </form>

    </div>

@endsection
