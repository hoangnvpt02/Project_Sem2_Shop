<!DOCTYPE html>
<html lang="en">

<head>
	@include('head')
</head>

<body>
	<!-- HEADER -->
	@include('header')
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	@include('navigation')
	<!-- /NAVIGATION -->

	@yield('content')
	
	<!-- FOOTER -->
	@include('footer')

</body>

</html>
