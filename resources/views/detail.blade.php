@extends('layouts.header-footer')

@section('header-footer')


	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.png')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Detil Produk</h2>
						<div class="breadcrumb__option">
							<a href="{{route('home')}}">Halaman Utama</a>
							<span>Detil</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Section End -->

	<!-- Product Details Section Begin -->
	<section class="product-details spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="product__details__pic">
						<div class="product__details__pic__item">
							<img class="product__details__pic__item--large"
							     src="{{asset('assets/images/product/' . $product->image)}}" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="product__details__text">
						<h3>{{$product->nama}}</h3>
						<div class="product__details__price">Rp. {{number_format($product->price, 0, ",")}}</div>
						<p>{{$product->deskripsi}}</p>

						<form method="POST" action="{{route('user.cart.store', $product->id)}}">
							@csrf
							<div class="product__details__quantity">
								<div class="quantity">
									<div class="pro-qty">
										<input type="text" name="jumlah" value="1">
									</div>
								</div>
							</div>
							<button type="submit" class="primary-btn">Tambah Keranjang</button>
						</form>

						<ul>
							<li><b>Stok</b> <span>{{$product->stok}}</span></li>
							<li><b>Dosis</b> <span>{{$product->dosis}}</span></li>
							<li><b>Aturan Pakai</b> <span>{{$product->aturan_pakai}}</span></li>
							<li><b>Golongan Product</b> <span>{{$product->golongan_produk}}</span></li>
							<li><b>Kemasan</b> <span>{{$product->kemasan}}</span></li>
							<li><b>Manufaktur</b> <span>{{$product->manufaktur}}</span></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="product__details__tab">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
								   aria-selected="true">Description</a>
							</li>
{{--							<li class="nav-item">--}}
{{--								<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"--}}
{{--								   aria-selected="false">Perhatian</a>--}}
{{--							</li>--}}
{{--							<li class="nav-item">--}}
{{--								<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"--}}
{{--								   aria-selected="false">Reviews <span>(1)</span></a>--}}
{{--							</li>--}}
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tabs-1" role="tabpanel">
								<div class="product__details__tab__desc">
									<h6>Deskripsi</h6>
									<p>{{$product->deskripsi}}</p>
									<h6>Indikasi Umum</h6>
									<p>{{$product->indikasi_umum}}</p>
									<h6>Komposisi</h6>
									<p>{{$product->komposisi}}</p>
									<h6>Kontra Indikasi</h6>
									<p>{{$product->kontra_indikasi}}</p>
									<h6>Kontra Indikasi</h6>
									<p>{{$product->kontra_indikasi}}</p>
									<h6>Perhatian</h6>
									<p>{{$product->perhatian}}</p>
									<h6>Efek Samping</h6>
									<p>{{$product->efek_samping}}</p>
								</div>
							</div>
{{--							<div class="tab-pane" id="tabs-2" role="tabpanel">--}}
{{--								<div class="product__details__tab__desc">--}}
{{--									<h6>Perhatian</h6>--}}
{{--									<p>{{$product->perhatian}}</p>--}}
{{--									<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem--}}
{{--										ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet--}}
{{--										elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum--}}
{{--										porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus--}}
{{--										nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<div class="tab-pane" id="tabs-3" role="tabpanel">--}}
{{--								<div class="product__details__tab__desc">--}}
{{--									<h6>Products Infomation</h6>--}}
{{--									<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.--}}
{{--										Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.--}}
{{--										Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam--}}
{{--										sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo--}}
{{--										eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.--}}
{{--										Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent--}}
{{--										sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac--}}
{{--										diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante--}}
{{--										ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;--}}
{{--										Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.--}}
{{--										Proin eget tortor risus.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Product Details Section End -->

@endsection