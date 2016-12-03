@extends('layouts.sb-admin')

@section('page-title')
	Albums
	<a class="btn btn-primary" href="{{ route('albums.create') }}">
		<i class="fa fa-plus"></i> 
	</a>
@endsection

@section('content')
	<div class="row">		
	@foreach($apartments as $apartment)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <a href="{{ route('albums.show', ['id' => $apartment->id]) }}">
	      	<img src="{{ $apartment->cover_image }}" alt="{{ $apartment->name }}">
	      </a>
	      <div class="caption">
	        <h3>{{ $apartment->name }}</h3>
	      </div>
	    </div>
	  </div>
	@endforeach
	</div>
	
	{{ $apartments->links() }}
@endsection