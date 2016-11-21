<!DOCTYPE html>
<html>
	<head>
		<title>SB Admin</title>

		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">
	</head>
<body>

	<div id="wrapper">
		@include('layouts.partials.sb-admin-navbar')
		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page-title')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            @yield('content')
		</div>
	</div>

	<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>