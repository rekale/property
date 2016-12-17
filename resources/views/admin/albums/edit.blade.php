@extends('layouts.sb-admin')

@section('page-title')
	Edit Album for apartment: {{ $apartment->name }}
@endsection

@section('content')
	
	<div class="row">
		@include('layouts.partials.error-messages')
		
		<div class="col-md-9">
		
			<form method="POST" action="{{ route('apartments.albums.update', ['apartmentId' => $apartment->id, 'albumId' => $apartment->albums[0]->id]) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label>Album Name:</label>
			    	<input type="text" class="form-control" name="name" value="{{ $apartment->albums[0]->name or null }}">
				</div>


				<button type="submit" class="btn btn-primary">Submit</button>
			</form>	
		
		</div>

	</div>
		
@stop