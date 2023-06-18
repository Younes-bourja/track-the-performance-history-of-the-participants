<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
		@include('layouts.head')
	</head>
	
	<body class="main-body bg-primary-transparent">
	<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
	</div>

					@include('layouts.main-header2')			

	<div class=" container-fluid">
				@yield('page-header')
				@yield('content')
				@include('layouts.sidebar2')
				@include('layouts.models')
				@include('layouts.footer-scripts')		
            	@include('layouts.footer')
	</body>
</html>