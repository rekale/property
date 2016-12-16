@extends('layouts.sb-admin')

@section('page-title')
	Edit Album
@endsection

@section('content')
	
	<div class="row">
		@include('layouts.partials.error-messages')
		
		<div class="col-md-9">
		
			<form method="POST" action="{{ route('albums.update', ['id' => $album->id]) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label>Apartments:</label>
					<input type="hidden" name="apartment_id" value="{{ $album->apartment->id }}">
			    	<input type="text" class="form-control" name="name" value="{{ $album->apartment->name }}" disabled="">
				</div>
				<div class="form-group">
					<label>Album Name:</label>
			    	<input type="text" class="form-control" name="name" value="{{ $album->name or null }}">
				</div>


				<button type="submit" class="btn btn-primary">Submit</button>
			</form>	
		
		</div>

	</div>
		
@stop