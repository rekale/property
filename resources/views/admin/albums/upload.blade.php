@extends('layouts.sb-admin')

@section('page-title')
	Upload photos
	<a class="btn btn-primary" href="{{ route('apartments.create') }}">
		<i class="fa fa-plus"></i> 
	</a>
@endsection

@section('content')
	
	<div class="col-md-9">
		<form action="{{ route('albums.upload.store') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
			    <label>Select Apartment:</label>
			    <select class="form-control" name="apartment_id">
		            @foreach($apartments as $id => $name)
		    			<option value="{{ $id }}">
		    				{{ $name }}
		    			</option>
		    		@endforeach
			    </select>
			</div>

			<div class="form-group">
			    <label>Select Album:</label>
			    <select class="form-control" name="album_id">
		            @foreach($albums as $id => $name)
		    			<option value="{{ $id }}">
		    				{{ $name }}
		    			</option>
		    		@endforeach
			    </select>
			</div>

			<div class="form-group">
				 <label>Select Images:</label>
				<input type="file" class="form-control" name="images[]" multiple>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>

		</form>	
	</div>

@endsection