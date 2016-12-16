@extends('layouts.sb-admin')

@section('page-title')
	List Album from apartment {{ $apartment->name }}
	<a class="btn btn-primary" href="{{ route('albums.create') }}">
		<i class="fa fa-plus"></i> 
	</a>
@endsection

@section('content')
	<div class="row">		
	@foreach($apartment->albums as $album)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <a href="{{ route('albums.show.images', ['id' => $album->id]) }}">
	      	<img src="{{ asset('icon/folder.jpg') }}">
	      </a>
	      <div class="caption">
	        <h3 style="text-align: center">{{ $album->name }}</h3>
	        <div style="margin: 0 auto; width: 9em">
	        	<a href="{{ route('albums.edit', ['id' => $album->id]) }}">
	        		<button class="btn btn-success">Edit</button>
        		</a>
	        	<button class="btn btn-danger"
	        			onclick="if( confirm('are you sure?') ) { 
								event.preventDefault();
                                document.getElementById('album-{{ $apartment->id }}').submit();
                     }
                     else{
                     	event.preventDefault();
                     }"
                 >
                 	Delete
             	</button>
	        	<form class="hidden" id="album-{{ $album->id }}" 
        			method="POST" action="{{ route('albums.destroy', ['id' => $album->id]) }}">
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