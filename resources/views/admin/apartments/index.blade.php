@extends('layouts.sb-admin')

@section('page-title')
	Apartements
	@if(in_array(auth()->user()->level, [2, 3]))
		<a class="btn btn-primary" href="/apartments/create">
			<i class="fa fa-plus"></i> 
		</a>
	@endif
	<form class="form-inline" action="{{ route('apartments.index') }}" method="GET" style="float: right">
		<div class="form-group">
	    	<input type="text" class="form-control" name="q" value="{{ Request::input('q') }}" placeholder="Search here..">
  		</div>
  		<button class="btn btn-sm btn-default">Search</button>
	</form>
@endsection

@section('content')
	<div>
		<form class="form-inline">
			<div class="form-group">
				<select name="field" class="form-control">
					@foreach($fieldSearchable as $field)
						<option value="{{ $field }}" {{Request::input('field') == $field ? 'selected':''}}>
							{{ $field }}
						</option>
					@endforeach	
				</select>
			</div>
			<div class="form-group">
				<select name="sort" class="form-control">
					<option name="asc" {{Request::input('sort') == $field ? 'selected':''}}>
						asc
					</option>
					<option name="desc" {{Request::input('sort') == $field ? 'selected':''}}>
						desc
					</option>
				</select>
			</div>
			<div class="form-group">
				<input type="number" name="range[]" class="form-control" value="{{Request::input('range')[0]}}" placeholder="min price..">
			</div>
			<div class="form-group">
				<input type="number" name="range[]" class="form-control" value="{{Request::input('range')[1]}}" placeholder="max price..">
			</div>
			<button class="btn btn-default">go</button>
		</form>
	</div>
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
				@if(in_array(auth()->user()->level, [2, 3]))
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
				@endif
					<a class="btn btn-success" href="{{ route('apartments.albums.index', ['id' => $apartment->id]) }}">
						see albums
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