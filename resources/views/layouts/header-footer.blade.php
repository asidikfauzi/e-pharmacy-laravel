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
</head>

<body>

<style>
    .header__top__right__auth {
        position: relative;
        display: inline-block;
    }

    .header__top__right__auth .dropdown-menu {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        right: 0; /* Agar dropdown muncul di sebelah kanan */
    }

    .header__top__right__auth .dropdown-menu a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .header__top__right__auth .dropdown-menu a:hover {
        background-color: #f1f1f1;
    }

    .header__top__right__auth:hover .dropdown-menu {
        display: block;
    }

</style>

@include('sweetalert::alert')

<header class="header">
	<div class="header__top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="header__top__left">
						<ul>
							<li><i class="fa fa-envelope"></i> epharmacy@ubaya.com</li>
							<li>Free Shipping for all Order of IDR 500.000</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="header__top__right">
						@if(!Auth::user())
							<div class="header__top__right__auth">
								<a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>
							</div>
						@else
							<div class="header__top__right__auth dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-user"></i> {{ Auth::user()->email }}
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{route('admin.index')}}">Dashboard</a>
									<a class="dropdown-item" href="{{route('password')}}">Change Password</a>
									<a class="dropdown-item" style="color: red" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
								</div>
							</div>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="header__logo">
					<a href="{{route('home')}}"><h2><span style="color: #7fad39">E</span>-pharmacy</h2></a>
				</div>
			</div>
			<div class="col-lg-6">
				<nav class="header__menu">
					<ul>
						<li><a href="{{route('home')}}">Utama</a></li>
						<li><a href="./shop-grid.html">Belanja</a></li>
						{{--						<li><a href="#">Pages</a>--}}
						{{--							<ul class="header__menu__dropdown">--}}
						{{--								<li><a href="./shop-details.html">Shop Details</a></li>--}}
						{{--								<li><a href="./shoping-cart.html">Shoping Cart</a></li>--}}
						{{--								<li><a href="./checkout.html">Check Out</a></li>--}}
						{{--								<li><a href="./blog-details.html">Blog Details</a></li>--}}
						{{--							</ul>--}}
						{{--						</li>--}}
						{{--						<li><a href="./blog.html">Blog</a></li>--}}
						<li><a href="./contact.html">Contact</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-3">
				<div class="header__cart">
					<ul>
						<li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="humberger__open">
			<i class="fa fa-bars"></i>
		</div>
	</div>
</header>
<!-- Header Section End -->


@yield('header-footer')

<!-- Footer Section Begin -->
<footer class="footer spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-6">
				<div class="footer__about">
					<div class="footer__about__logo">
						<a href="{{route('home')}}"><h2><span style="color: #7fad39">E</span>-pharmacy</h2></a>
					</div>
					<ul>
						<li>Address: Jl. Raya Kalirungkut, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa Timur 60293</li>
						<li>Phone: +62 813-4940-4004</li>
						<li>Email: epharmacy@ubaya.com</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="footer__widget">
					<h6>Join Our Newsletter Now</h6>
					<p>Get E-mail updates about our latest shop and special offers.</p>
					<form action="#">
						<input type="text" placeholder="Enter your mail">
						<button type="submit" class="site-btn">Subscribe</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/js/mixitup.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
@yield('script')


</body>

</html>