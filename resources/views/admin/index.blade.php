@extends('layouts.header-footer')

@section('header-footer')
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.png')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Dashboard Admin</h2>
						<div class="breadcrumb__option">
							<a href="{{route('home')}}">Utama</a>
							<span>Dashboard Admin</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Categories Section Begin -->
	<section class="categories spad">
		<div class="container">
			<div class="row">
				<div class="admin_dashboard owl-carousel">
					<div class="col-lg-3">
						<div class="categories__item set-bg">
							<center>
								<img src="{{asset('assets/img/app/order.png')}}" style="width: 200px; height: 200px">
							</center>
							<h5><a href="#">Pesanan Masuk</a></h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="categories__item set-bg">
							<center>
								<img src="{{asset('assets/img/app/product.png')}}" style="width: 200px; height: 200px">
							</center>
							<h5><a href="#">Produk</a></h5>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="categories__item set-bg">
							<a href="{{route('admin.category.index')}}">
								<center>
									<img src="{{asset('assets/img/app/category.png')}}" style="width: 200px; height: 200px">
								</center>
								<h5>Kategori Produk</h5>
							</a>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="categories__item set-bg">
							<center>
								<img src="{{asset('assets/img/app/recap.png')}}" style="width: 200px; height: 200px">
							</center>
							<h5><a href="#">Rekap Penghasilan</a></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Categories Section End -->

@endsection
