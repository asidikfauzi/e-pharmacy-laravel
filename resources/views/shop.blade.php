@extends('layouts.header-footer')

@section('header-footer')

	<style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            margin-right: 5px; /* Atur jarak antar tautan */
        }

	</style>

	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.png')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Dashboard Admin</h2>
						<div class="breadcrumb__option">
							<a href="{{route('admin.index')}}">Halaman Utama</a>
							<span>Category</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Section End -->

	<!-- Product Section Begin -->
	<section class="product spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-5">
					<div class="sidebar">
						<div class="sidebar__item">
							<h4>Department</h4>
							<ul>
								<li><a href="{{ route('shop') }}">Semua</a></li>
								@foreach($categories as $value)
									<li><a href="{{ route('shop', ['category_id' => $value->id]) }}">{{$value->nama}}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="sidebar__item">
							<h4>Price</h4>
							<div class="price-range-wrap">
								<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
								     data-min="10" data-max="540">
									<div class="ui-slider-range ui-corner-all ui-widget-header"></div>
									<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
									<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
								</div>
								<div class="range-slider">
									<div class="price-input">
										<input type="text" id="minamount">
										<input type="text" id="maxamount">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-7">
					<div class="filter__item">
						<div class="row">
							<div class="col-lg-12 col-md-4">
								<div class="filter__found">
									<h6><span>{{$count}}</span> Produk ditemukan.</h6>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach($products as $value)
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="product__item">
									<div class="product__item__pic set-bg" data-setbg="{{asset('assets/images/product/'.$value->image)}}">
										<ul class="product__item__pic__hover">
											<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
										</ul>
									</div>
									<div class="product__item__text">
										<h6><a href="#">{{$value->nama}}</a></h6>
										<h5>Rp.{{number_format($value->price, 0, ',')}}</h5>
									</div>
								</div>
							</div>
						@endforeach
					</div>
{{--					<div class="pagination custom-pagination">--}}
{{--						{!! $products->render() !!}--}}
{{--					</div>--}}

					<div class="pagination custom-pagination">
						{!! $products->links('vendor.pagination.custom-pagination') !!}
					</div>


				</div>
			</div>
		</div>
	</section>
	<!-- Product Section End -->

@endsection