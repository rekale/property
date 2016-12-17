@extends('layouts.sb-admin')

@section('page-title')
	Upload photos
@endsection

@section('content')
	
	<div class="col-md-9">
		<form action="{{ route('apartments.albums.photos.store', ['apartmentId' => $apartment->id, 'albumId' => $album->id]) }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				 <label>Select Images:</label>
				<input type="file" class="form-control" name="images[]" multiple>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>

		</form>	
	</div>

@endsection