@extends('layouts.app')

@section('title', 'New post')

@section('content')

    <div class="share-wrapper">

        <form>
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
                <textarea name="description" id="form-description" class="form-description" placeholder="Write a description..."></textarea>
                <p>Description</p>
            </div>
            <!--<div class="form-field">
                <fieldset>
                    <div class="form-checkbox">
                        <input type="checkbox" name="file-checkbox" class="checkbox-input" id="0" value="some tag">
                        <i class="fas fa-check-square checkbox-checked"></i>
                        <i class="far fa-square"></i>
                        <label for="0">some tag</label>
                    </div>
                </fieldset>
                <p>Select tags</p>
            </div>-->
            <input type="submit" value="share post" class="share-submit form-submit">
        </form>

    </div>

@endsection
