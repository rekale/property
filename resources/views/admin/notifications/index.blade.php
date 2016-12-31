@extends('layouts.sb-admin')

@section('page-title')
	Notification
@endsection

@section('content')
	
	<div class="row">	
		<div class="col-md-12">
			<ul>
			@foreach($notifications as $notif)
				<li>{{$notif->message}} {{ $notif->created_at->diffForHumans() }}</li>
			@endforeach
			</ul>
		</div>
	</div>
		
@stop