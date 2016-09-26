@extends('layouts.user')

@section('title', 'Locations')

@section('content')

	    <div class="map col-lg-8" id="map"></div>
	    <div class='col-lg-4 right-panel'>
	    	<div>
	   			<button type="button" class="btn btn-primary" style='display: none; margin-top:10px' id='cancel_route'>Cancel</button>
	   		</div>
	    	<div id="directions-panel">
	    	</div>

	    	<div id='banks'>
	    		<ul>
	    			<li class="active">All</li>
	    			@foreach($banks as $bank)
	    			<li>{{$bank}}</li>
	    			<div class='addresses' id="{{preg_replace("/[^a-z]/", '', strtolower($bank))}}"></div>
	    			@endforeach
	    		</ul>
	    	</div> 
	    </div>
	    <form id="bl-form" onclick="return false;" style="margin:10px">
	    	<input autocomplete="off" class="controls" type="text" placeholder="Look for specific zipcode.." id="bl-input" />
	    </form>
	
@endsection

@section('scripts')
	<script>
		var banks = JSON.parse('{!!json_encode($banks)!!}');
	</script>
    <script src="js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONNVX-dpGHx0lv6vTgcLmBHRlG_EditI&libraries=places&callback=initMap"
    async defer></script>
@endsection