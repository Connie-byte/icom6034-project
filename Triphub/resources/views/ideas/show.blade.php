@extends('layout')

<link rel="stylesheet" href="\css\ideas\show.css">


@section('content')


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<!-- Splite into two columns where left contains image and right contain trip information-->
<div id="tripContainer">
    <div id="leftColumn">
        <img src="https://www.w3schools.com/w3css/img_lights.jpg" alt="Lights">
        <img src="{{$idea->images->first()->path}}" alt="Lights">
    </div>

    <div id="rightColumn">
        <div id="ideaContainer">

            <div class="row">
                <div id="ideaTitle"> {{$idea->title}}</div>
                <a class="submitButton" href="{{ route('ideas.create', $idea->id) }}" id="addIdea"> New Idea</a>
            </div>

            <div class="row">
                <div id="ideaDate">{{ date('Y-m-d', strtotime($idea->start_date)) }} to {{ date('Y-m-d', strtotime($idea->end_date)) }}</div>
                <div id="ideaAuthor">by {{$idea->user->name}}</div>
            </div>

            <div class="row">
                <div id="ideaLocation"> {{$idea->destination}}</div>
                @if ($idea->accommodation)
                <a id="ideaAccommodation" href="{{ route('accommodations.show', $idea->accommodation->id) }}"> Accommodation: {{$idea->accommodation->name}}</a>
                @endif
            </div>
            <div id="ideaContent"> {{$idea->content}}</div>

            <div id="tagContainer">
                @foreach ($idea->tags as $tag)
                <div class="tags"> #{{$tag->tag_name}}</div>
                @endforeach
            </div>
        </div>

        <div id="commentContainer">
            <div id="commentTitle"> Comments</div>

            <div class="userComment">
                @foreach ($idea->comments as $comment)
                <div class="row">
                    <div id="commentAuthor"> {{$comment->user->name}}</div>
                    <div id="commentDate"> {{ date('Y-m-d', strtotime($comment->date)) }}</div>
                </div>
                <div id="comment"> {{$comment->content}}</div>
                @endforeach
            </div>


            <!--a form for user to enter comment-->
            <div id="commentForm">
                <form action="{{ route('ideas.addComment', ['idea' => $idea->id]) }}" method="POST">
                    @csrf

                    <div class="row">
                        <textarea name="commentInput" id="commentInput"></textarea>
                        <button class="submitButton" type="submit">Submit</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


@endsection