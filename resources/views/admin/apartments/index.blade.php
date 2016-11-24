@extends('layouts.sb-admin')

@section('page-title')
	Apartements
	<a class="btn btn-primary" href="{{ route('apartments.create') }}">
		<i class="fa fa-plus"></i> 
	</a>
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
						<th>No</th>
						<td>{{ $apartment->id }}</td>
					</tr>
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
						<td>@foreach($apartment->facilities as $f){{ $f }}, @endforeach</td>
					</tr>
				</tbody>
			</table>
			<div class="btn-group">
				<a class="btn btn-success" href="{{ route('apartments.edit', ['id' => $apartment->id]) }}">
					<i class="fa fa-pencil"></i>
				</a>
				<a  class="btn btn-danger"
					href="{{ route('apartments.destroy', ['id' => $apartment->id ]) }}" 
					onclick="if( confirm('are you sure?') ) { 
								event.preventDefault();
                                document.getElementById('apartment-{{ $apartment->id }}').submit();
                     }
                     else{
                     	event.preventDefault();
                     }"
                 >
					<i class="fa fa-eraser" aria-hidden="true"></i>
				</a>
				<form 
					id="apartment-{{ $apartment->id }}" 
					action="{{ route('apartments.destroy', ['id' => $apartment->id ]) }}" 
					method="POST" 
					style="display: none;"
				>
					{{ method_field('DELETE') }}
                    {{ csrf_field() }}
					
                </form>
			</div>
		</div>
	</div>
	@endforeach
	
	{{ $apartments->links() }}
@endsection