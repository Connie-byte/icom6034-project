@extends('layout')

<link rel="stylesheet" href="\css\ideas\create.css">


@section('content')

<div class="createContainer">
    <div id="title">Write Idea</div>
    <form action="{{ route('ideas.store') }}" method="POST">
        @csrf
        <input type="text" name="title" id="ideaTitle" placeholder="Trip Idea">
        <textarea name="content" id="description" placeholder="Write your trip ideas..."></textarea>
        <div class="row">
            <div id="tagContainer">
                <div name="tags" class="tags">#tag</div>
            </div>
            <img src="\img\location.svg">
            <div name="location" id="location">Hong Kong</div>
        </div>
        <div id="submitContainer" class="row">
            <div id="addPicture">Picture</div>
            <div id="addDestination">Destination</div>
            <div id="addTag">Tag</div>
        
            <button class="submitButton" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection