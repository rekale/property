@extends('layouts.sb-admin')

@section('page-title')
	Create Album for apartment: {{ $apartment->name }}
@endsection

@section('content')
	
	<div class="row">
		@include('layouts.partials.error-messages')
		
		<div class="col-md-9">
		
			<form method="POST" action="{{ route('apartments.albums.store', ['id' => $apartment->id]) }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Album Name:</label>
			    	<input type="text" class="form-control" name="name" value="{{ $album->name or null }}">
				</div>


				<button type="submit" class="btn btn-primary">Submit</button>
			</form>	
		
		</div>

	</div>
		
@stop