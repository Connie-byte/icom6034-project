@extends('layout')

<link rel="stylesheet" href="\css\accommodations\show.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

@section('content')
<!-- Splite into two columns where left contains image and right contain trip information-->

<div id="tripContainer">
    <div id="leftColumn">
        <img src="{{ $accommodation->images->first()->path }}" alt="Lights">
    </div>

    <div id="rightColumn">
        <div id="accommodationContainer">

            <div id="accommodationTitle"> {{ $accommodation->name }}</div>

            <div class="row">
                <div id="accommodationDate">{{ date('Y-m-d', strtotime($accommodation->start_date)) }} to {{ date('Y-m-d', strtotime($accommodation->end_date)) }}</div>
            </div>

            <div id="accommodationLocation"> Address: {{ $accommodation->address }}</div>
            <div id="accommodationPrice"> Price: ${{ $accommodation->price }}</div>

            <div class="accommodationImages">
                @foreach ($accommodation->images as $image)
                <img src="{{ $image->path }}" alt="Lights">
                @endforeach
            </div>

        </div>

        <button class="submitButton">Add to my idea</button>

        <div id="myIdeasPopUp" title="myIdeas">
            @foreach ($userIdeas as $idea)
            <form action="{{ route('ideas.updateAccommodation', ['idea' => $idea->id, 'accommodation' => $accommodation->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="card">
                    <img src="{{ $idea->images->first()->path }}" alt="Lights">
                    <div>{{ $idea->title }}</div>
                </button>
            </form>
            @endforeach
        </div>

    </div>
</div>

<script>
    $(function() {
        $("#myIdeasPopUp").dialog({
            autoOpen: false,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            }
        });

        $(".submitButton").on("click", function() {
            $("#myIdeasPopUp").dialog("open");
        });

    });
</script>





@endsection