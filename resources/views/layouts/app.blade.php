@extends('layouts.header-footer')

@section('header-footer')

<!-- Hero Section Begin -->
<section class="hero">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="hero__categories">
					<div class="hero__categories__all">
						<i class="fa fa-bars"></i>
						<span>Semua Kategori</span>
					</div>
					<ul>
						<li><a href="#">Fresh Meat</a></li>
						<li><a href="#">Vegetables</a></li>
						<li><a href="#">Fruit & Nut Gifts</a></li>
						<li><a href="#">Fresh Berries</a></li>
						<li><a href="#">Ocean Foods</a></li>
						<li><a href="#">Butter & Eggs</a></li>
						<li><a href="#">Fastfood</a></li>
						<li><a href="#">Fresh Onion</a></li>
						<li><a href="#">Papayaya & Crisps</a></li>
						<li><a href="#">Oatmeal</a></li>
						<li><a href="#">Fresh Bananas</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="hero__search">
					<div class="hero__search__form">
						<form action="#">
							<input type="text" placeholder="Apa yang kamu butuhkan ?">
							<button type="submit" class="site-btn">Cari</button>
						</form>
					</div>
					<div class="hero__search__phone">
						<div class="hero__search__phone__icon">
							<a href="https://wa.me/+6281349404004" target="_blank">
								<i class="fa fa-phone" style="color: #6AB963"></i>
							</a>
						</div>

						<div class="hero__search__phone__text">
							<h5>+62 813-4940-4004</h5>
							<span>Layanan 24 jam</span>
						</div>
					</div>
				</div>
				@yield('content-banner')
			</div>
		</div>
	</div>
</section>
<!-- Hero Section End -->

@yield('content-main')

@endsection
