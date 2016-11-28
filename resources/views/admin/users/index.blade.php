@extends('layouts.sb-admin')

@section('page-title')
	Users
	<a class="btn btn-primary" href="{{ route('users.create') }}">
		<i class="fa fa-plus"></i> 
	</a>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Active</th>
						<th>Action</th>
					</tr>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->active ? 'yes': 'no' }}</td>
							<td>
								<button class="btn btn-{{ $user->active ? 'danger':'primary' }}"
									onclick="if( confirm('are you sure?') ) { 
												event.preventDefault();
				                                document.getElementById('user-{{ $user->id }}').submit();
				                     }
				                     else{
				                     	event.preventDefault();
				                     }"
								>
									<i class="fa fa-{{ $user->active ? 'power-off':'check' }}"></i>
								</button>
								<form action="{{ route('users.update', ['id' => $user->id]) }}" 
									  id="user-{{ $user->id }}" 
									  style="display: none"
									  method="POST" 
								>
									{{ method_field('PUT') }}
                    				{{ csrf_field() }}
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
	{{ $users->links() }}
@endsection