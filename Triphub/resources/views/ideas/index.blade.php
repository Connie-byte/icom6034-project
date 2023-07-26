@extends('layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

@section('content')

<div id="container">
    @foreach ($ideas as $idea)
    <a href="{{ route('ideas.show',$idea->id) }}" class="card">
        <img src="{{ $idea->images->first()->path }}" alt="Lights">
        <div>{{ $idea->title }}</div>
    </a>
    @endforeach
</div>





@endsection