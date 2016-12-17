@extends('layouts.sb-admin')

@section('page-title')
	Images from album {{ $album->name }}
@endsection

@section('content')
	
	<div class="row">		
  		@foreach($album->photos as $photo)
		    <div class="thumbnail col-md-4">
		      	<img src="{{ $photo->url }}">
		      	<div class="caption">
			        <div style="margin: 0 auto; width: 9em">
			        	<button class="btn btn-danger"
			        			onclick="if( confirm('are you sure?') ) { 
										event.preventDefault();
		                                document.getElementById('photo-{{ $photo->id }}').submit();
		                     }
		                     else{
		                     	event.preventDefault();
		                     }"
		                 >
		                 	Delete
		             	</button>
			        	<form class="hidden" id="photo-{{ $photo->id }}" 
		        			method="POST" action="{{ route('apartments.albums.photos.destroy', ['apartmentId' => $apartment->id, 'albumId' => $album->id, 'photoId' => $photo->id]) }}">
							{{ method_field('DELETE') }}
		                    {{ csrf_field() }}
			        	</form>
			        </div>
		    	</div>
		  	</div>
		@endforeach
	
		
@stop