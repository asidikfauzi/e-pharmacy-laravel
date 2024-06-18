@extends('layouts.header-footer')

@section('header-footer')

	<style>
        .hero__categories {
            /* Other styles */
        }

        .hero__categories__list {
            max-height: 500px; /* Atur tinggi maksimum sesuai kebutuhan Anda */
            overflow-y: auto;
        }
	</style>
	<!-- Hero Section Begin -->


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
						<div class="hero__categories__list">
							<ul>
								@foreach($categories as $value)
									<li><a href="{{route('shop', ['category_id' => $value->id])}}">{{$value->nama}}</a></li>
								@endforeach
							</ul>
						</div>
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
