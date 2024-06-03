@extends('layouts.head')

@section('head')
	@foreach($products as $value)
		<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
			<div class="featured__item">
				<div class="featured__item__pic set-bg" data-setbg="{{ asset('assets/images/product/'.$value->image) }}">
					<ul class="featured__item__pic__hover">
						<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
					</ul>
				</div>
				<div class="featured__item__text">
					<h6><a href="#">{{$value->nama}}</a></h6>
					<h5>Rp. {{number_format($value->price, 0, ',')}}</h5>
				</div>
			</div>
		</div>
	@endforeach

@endsection
