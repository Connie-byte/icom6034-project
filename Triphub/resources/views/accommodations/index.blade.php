@extends('layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

@section('content')

<div id="container">
    @foreach ($accommodations as $accommodation)

    <a  href="{{ route('accommodations.show',$accommodation->id) }}" class="card">
        <img src="{{ $accommodation->images->first()->path }}" alt="Lights">
        <div>{{ $accommodation->name }}</div>
    </a>

    @endforeach

</div>





@endsection