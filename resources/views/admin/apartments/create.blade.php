@extends('layouts.sb-admin')

@section('page-title')
	Create Apartement
@endsection

@section('content')
	
	<div class="row">
		@include('layouts.partials.error-messages')

		<div class="col-md-9">
			<form action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
				@include('admin.apartments.form')
			</form>	
		</div>
	</div>
@stop