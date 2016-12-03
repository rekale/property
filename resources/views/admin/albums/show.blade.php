@extends('layouts.sb-admin')

@section('page-title')
	List Album from {{ $apartment->name }}
	<a class="btn btn-primary" href="{{ route('albums.create') }}">
		<i class="fa fa-plus"></i> 
	</a>
@endsection

@section('content')
	<div class="row">		
	@foreach($apartment->albums as $album)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <a href="{{ route('albums.show.images', ['apartment_id' => $apartment->id, 'album_id' => $album->id]) }}">
	      	<img src="{{ asset('icon/folder.jpg') }}">
	      </a>
	      <div class="caption">
	        <h3>{{ $album->name }}</h3>
	      </div>
	    </div>
	  </div>
	@endforeach
	</div>
	
@endsection