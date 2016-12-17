@extends('layouts.sb-admin')

@section('page-title')
	Albums from apartment: {{ $apartment->name }}
	<a class="btn btn-primary" href="{{ route('apartments.albums.create', ['id' => $apartment->id]) }}">
		<i class="fa fa-plus"></i> 
	</a>
@endsection

@section('content')
	<div class="row">		
	@foreach($apartment->albums as $album)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <a href="{{ route('apartments.albums.photos.index', ['apartmentId' => $apartment->id, 'albumId' => $album->id]) }}">
	      	<img src="{{ asset('icon/folder.jpg') }}">
	      </a>
	      <div class="caption">
	        <h3 style="text-align: center">{{ $album->name }}</h3>
	        <div style="margin: 0 auto; width: 9em">
	        	<a href="{{ route('apartments.albums.edit', ['apartmentId' => $apartment->id, 'albumId' => $album->id]) }}">
	        		<button class="btn btn-success">Edit</button>
        		</a>
	        	<button class="btn btn-danger"
	        			onclick="if( confirm('are you sure?') ) { 
								event.preventDefault();
                                document.getElementById('album-{{ $album->id }}').submit();
                     }
                     else{
                     	event.preventDefault();
                     }"
                 >
                 	Delete
             	</button>
	        	<form class="hidden" id="album-{{ $album->id }}" 
        			method="POST" action="{{ route('apartments.albums.destroy', ['apartmentId' => $apartment->id, 'albumId' => $album->id]) }}">
					{{ method_field('DELETE') }}
                    {{ csrf_field() }}
	        	</form>
	        </div>
	      </div>
	    </div>
	  </div>
	@endforeach
	</div>
	
@endsection