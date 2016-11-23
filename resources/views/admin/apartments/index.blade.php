@extends('layouts.sb-admin')

@section('page-title')
	Apartements
@endsection

@section('content')
	@foreach($apartments as $apartment)
	<hr>
	<div class="row">
		<div class="col-md-3">
			<h3>{{ $apartment->name }}</h3>
		    <a href="#" class="thumbnail">
		      <img src="{{ $apartment->cover_image }}" alt="{{ $apartment->name }}">
		    </a>	
		  </div>
		<div class="col-md-9">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Address</th>
						<td>{{ $apartment->address }}</td>
					</tr>
					<tr>
						<th>District</th>
						<td>{{ $apartment->district }}</td>
					</tr>
					<tr>
						<th>Price</th>
						<td>{{ number_format($apartment->price, 0, '.', '.') }}</td>
					</tr>
					<tr>
						<th>Total Bedroom</th>
						<td>{{ $apartment->bedroom_total }}</td>
					</tr>
					<tr>
						<th>Total Unit</th>
						<td>{{ $apartment->unit_total }}</td>
					</tr>
					<tr>
						<th>Maintenance Fee</th>
						<td>{{ number_format($apartment->maintenance_fee, 0, '.', '.') }}</td>
					</tr>
					<tr>
						<th>Facilities</th>
						<td>@foreach(json_decode($apartment->facilities) as $f){{ $f }}, @endforeach</td>
					</tr>
				</tbody>
			</table>
			<div class="btn-group">
				<a class="btn btn-success"><i class="fa fa-pencil"></i></a>
				<a class="btn btn-danger"><i class="fa fa-eraser" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	@endforeach
	
	{{ $apartments->links() }}
@endsection