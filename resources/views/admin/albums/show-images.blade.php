@extends('layouts.sb-admin')

@section('page-title')
	Images from album {{ $album->name }}
@endsection

@section('content')
	
	<div class="row">		
	@foreach($album->photos as $photo)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      	<img src="{{ $photo->url }}">
	    </div>
	  </div>
	@endforeach
	</div>
	
		
@stop