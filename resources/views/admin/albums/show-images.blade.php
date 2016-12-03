@extends('layouts.sb-admin')

@section('page-title')
	Images
@endsection

@section('content')
	
	<div class="row">		
	@foreach($images as $image)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      	<img src="{{ asset($image) }}">
	    </div>
	  </div>
	@endforeach
	</div>
	
		
@stop