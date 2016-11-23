<!DOCTYPE html>
<html>
	<head>
		<title>SB Admin</title>

		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">
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

	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script>
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>
</body>
</html>