@extends('layouts.app')

@section('content-banner')
<div class="hero__item set-bg" data-setbg="{{asset('assets/img/hero/banner.jpg')}}">
	<div class="hero__text">
		<span>E-Apotek</span>
		<h2>Apotek Online Paling Komplit <br />100% Asli</h2>
		<p>Tersedia Penjemputan dan Pengiriman Gratis</p>
		<a href="{{route('shop')}}" class="primary-btn">Belanja Sekarang</a>

	</div>
</div>
@endsection

@section('content-main')
<!-- Categories Section Begin -->
<section class="categories">
	<div class="container">
		<div class="row">
			<div class="categories__slider owl-carousel">
				@foreach($sliderProduct as $value)
					<div class="col-lg-3">
						<div class="categories__item set-bg" data-setbg="{{ asset('assets/images/product/' . $value->image) }}">
							<h5><a href="#">{{$value->nama}}</a></h5>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Featured Product</h2>
				</div>
				<div class="featured__controls">
					<ul>
						<li class="active" data-category="all" onclick="filterProducts(this)">All</li>
						@foreach ($categories as $category)
							<li data-category="{{ $category->id }}" onclick="filterProducts(this)">
								{{ $category->nama }}
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="row featured__filter" id="product-list">
			@foreach($products as $value)
				<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
					<div class="featured__item">
						<div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/images/product/'.$value->image) }}">
							<ul class="featured__item__pic__hover">
								<li><a href="{{route('user.cart.store', $value->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
							</ul>
						</div>
						<div class="featured__item__text">
							<h6><a href="{{route('detail', $value->id)}}">{{$value->nama}}</a></h6>
							<h5>Rp. {{number_format($value->price, 0, ',')}}</h5>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
<!-- Featured Section End -->

@endsection

@section('script')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
        function filterProducts(element) {
            var category_id = $(element).data('category');

            $.ajax({
                url: "{{ route('home') }}",
                type: 'GET',
                data: {
                    category_id: category_id
                },
                success: function(response) {
                    $('#product-list').html(response);
                }
            });
        }
	</script>
@endsection
