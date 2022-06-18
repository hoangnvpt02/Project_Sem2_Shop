<!DOCTYPE html>
<html lang="en">

<head>
	@include('head')
</head>

<body id="bodya">
	<!-- HEADER -->
	@include('header')
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	@include('navigation')
	<!-- /NAVIGATION -->

	@yield('content')
	
	<!-- FOOTER -->
	@include('footer')
	@yield('js')
</body>

</html>
