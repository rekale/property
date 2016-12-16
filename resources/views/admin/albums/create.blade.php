@extends('layouts.sb-admin')

@section('page-title')
	Create Album
@endsection

@section('content')
	
	<div class="row">
		@include('layouts.partials.error-messages')
		
		<div class="col-md-9">
		
			<form method="POST" action="{{ route('albums.store') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Apartments:</label>
					<select class="form-control" name="apartment_id">
						@foreach($apartments as $apartment)
							<option value="{{ $apartment->id }}">{{ $apartment->name }}</option>
						@endforeach
					</select>
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