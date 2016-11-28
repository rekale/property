<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>SB Admin</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/sb-admin-2/css/bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/sb-admin-2/css/plugins/metisMenu/metisMenu.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/sb-admin-2/css/sb-admin-2.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/sb-admin-2/css/plugins/morris.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/sb-admin-2/font-awesome-4.1.0/css/font-awesome.css') }}">

		<link rel="stylesheet" type="text/css" href="{{ asset('assets/select2/dist/css/select2.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/select2-bootstrap-theme/dist/select2-bootstrap.css') }}">
		@yield('css')
	</head>
<body>

	<div id="wrapper">
		@include('layouts.partials.sb-admin-navbar')
		<div id="page-wrapper" style="min-height: 412px;">
			<div class="row">
                <div class="col-lg-12">
                	@include('flash::message')
                    <h1 class="page-header">@yield('page-title')</h1>
                </div>
            </div>
            
            @yield('content')
		</div>
	</div>

	<script  src="{{ asset('assets/sb-admin-2/js/jquery-1.11.0.js') }}"></script>
	<script  src="{{ asset('assets/sb-admin-2/js/bootstrap.js') }}"></script>
	<script  src="{{ asset('assets/sb-admin-2/js/plugins/metisMenu/metisMenu.js') }}"></script>
	<script  src="{{ asset('assets/sb-admin-2/js/plugins/morris/raphael.min.js') }}"></script>
	<script  src="{{ asset('assets/sb-admin-2/js/plugins/morris/morris.min.js') }}"></script>
	<script src="{{ asset('assets/sb-admin-2/js/sb-admin-2.js') }}"></script>
	
	<script src="{{ asset('assets/select2/dist/js/select2.js') }}"></script>
	
	<script>
		$(function(){
			// for destroy flash notification after show up
			$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
			
			// select2 setting
			$.fn.select2.defaults.set( "theme", "bootstrap" );
			$('.select2').select2({
				tags: true,
				width: '100%'
			});
		});

		//to show image from input file
		var Loader = {
			image: function(event, outputId) {
			    var output = document.getElementById(outputId);
			    output.src = URL.createObjectURL(event.target.files[0]);
		  	}
		};
	</script>
	@yield('js');
</body>
</html>