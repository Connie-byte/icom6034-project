
@extends('layout')

@section('content')
<style>

  #map-canvas{
	height: 450px; 
  }
</style>

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

<script src="/js/jquery-3.6.4.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9fTCzR8HFWSh62wupYKvEp7zCFKPL9Dc"></script>
<script src="/js/map_api.js"></script>


<div id="map-canvas" data-destination="{{ $destination }}"></div>
</div>
@endsection