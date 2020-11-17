<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        @include('layouts.head')
	</head>

	<body class="app sidebar-mini light-mode default-sidebar">
		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{URL::asset('assets/images/svgs/loader.svg')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				@include('layouts.side-menu')
				<div class="app-content main-content">
					<div class="side-app">
						@include('layouts.header')
						@yield('page-header')
						@yield('content')
            			@include('layouts.footer')
		</div><!-- End Page -->
			@include('layouts.footer-scripts')
	</body>
</html>
