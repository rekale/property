@extends('layouts.sb-admin')

@section('page-title')
	Edit Apartement
@endsection

@section('content')
	
	<div class="row">
		@include('layouts.partials.error-messages')

		<div class="col-md-9">
			<form action="{{ route('apartments.update', ['id' => $apartment->id]) }}" method="POST" enctype="multipart/form-data">
				{{ method_field('PUT') }}
				@include('admin.apartments.form')
			</form>	
		</div>
	</div>
@stop