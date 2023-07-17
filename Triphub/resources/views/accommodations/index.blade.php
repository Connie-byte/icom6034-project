@extends('layout')

<link rel="stylesheet" href="\css\accommodations\index.css">
<link rel="stylesheet" href="\css\global.css">

@section('content')
<!-- Splite into two columns where left contains image and right contain trip information-->

<div id="tripContainer">
    <div id="leftColumn">
        <img src="https://www.w3schools.com/w3css/img_lights.jpg" alt="Lights">
    </div>

    <div id="rightColumn">
        <div id="accommodationContainer">

            <div id="accommodationTitle"> Title</div>

            <div class="row">
                <div id="accommodationDate">StartDate to EndDate</div>
            </div>

            <div id="accommodationLocation"> Address: Location</div>
            <div id="accommodationPrice"> Price: $1000</div>
        </div>

        <button id="editButton">Add to my accommodation</button>


        </div>
    </div>
</div>


@endsection