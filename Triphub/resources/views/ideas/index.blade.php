@extends('layout')

<link rel="stylesheet" href="\css\ideas\index.css">
<link rel="stylesheet" href="\css\global.css">

@section('content')
<!-- Splite into two columns where left contains image and right contain trip information-->

<div id="tripContainer">
    <div id="leftColumn">
        <img src="https://www.w3schools.com/w3css/img_lights.jpg" alt="Lights">
        <img src="https://www.w3schools.com/w3css/img_lights.jpg" alt="Lights">
    </div>

    <div id="rightColumn">
        <div id="ideaContainer">

            <div id="ideaTitle"> Title</div>

            <div class="row">
                <div id="ideaDate">StartDate to EndDate</div>
                <div id="ideaAuthor">by Author</div>
            </div>

            <div id="ideaLocation"> Location</div>
            <div id="ideaDescription"> Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description </div>

            <div id="tagContainer">
                <div class="tags"> #Tags</div>
                <div class="tags"> #Tags</div>
                <div class="tags"> #Tags</div>
            </div>
        </div>

        <div id="commentContainer">
            <div id="commentTitle"> Comments</div>

            <div class="userComment">
                <div class="row">
                    <div id="commentAuthor"> Author</div>
                    <div id="commentDate"> Date</div>
                </div>
                <div id="comment"> Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments</div>
            </div>


            <!--a form for user to enter comment-->
            <div id="commentForm">
                <form action="/ideas" method="POST">
                    @csrf

                    <div class="row">
                        <textarea name="commentInput" id="commentInput"></textarea>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


@endsection