<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="E-pharmacy">
	<meta name="keywords" content="E-pharmacy, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>E-pharmacy</title>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/elegant-icons.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">
	<!-- Select2 CSS -->
</head>

<body>

@yield('head')

<!-- Js Plugins -->
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/js/mixitup.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

<!-- jQuery (diperlukan oleh Select2) -->
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@yield('script')


</body>

</html>
