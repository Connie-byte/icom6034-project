@extends('layout')

<link rel="stylesheet" href="\css\ideas\create.css">
<link rel="stylesheet" href="\css\global.css">


@section('content')

<div class="createContainer">
    <div id="title">Write Idea</div>
    <form action="/ideas" method="POST">
        @csrf
        <input type="text" name="ideaTitle" id="ideaTitle" placeholder="Trip Idea">
        <textarea name="description" id="description" placeholder="Write your trip ideas..."></textarea>
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
        
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection