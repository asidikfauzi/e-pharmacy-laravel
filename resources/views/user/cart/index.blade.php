@extends('layouts.header-footer')

@section('header-footer')
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.png')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Keranjang Kamu</h2>
						<div class="breadcrumb__option">
							<a href="{{route('home')}}">Halaman Utama</a>
							<span>Keranjang</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Section End -->

	<!-- Shoping Cart Section Begin -->
	<section class="shoping-cart spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="shoping__cart__table">
						<table>
							<thead>
							<tr>
								<th class="shoping__product">Produk</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							@foreach($carts as $value)
								<tr>
									<td class="shoping__cart__item">
										<img src="{{asset('assets/images/product/'.$value->image)}}" alt="" style="max-width: 40px">
										<h5>{{$value->nama}}</h5>
									</td>
									<td class="shoping__cart__price">
										Rp. {{number_format($value->price, 0, ',')}}
									</td>
									<td class="shoping__cart__quantity">
										<div class="quantity">
											<div class="pro-qty quantity-input">
												<input type="text" name="jumlah" value="{{$value->total_quantity}}"
												       class="quantity-input"
												       id="quantity-input"
												       data-product-id="{{$value->id}}"
												       data-price="{{$value->price}}">
											</div>
										</div>
									</td>
									<td class="shoping__cart__total" id="total-{{$value->id}}">
										Rp. {{number_format($value->price * $value->total_quantity, 0, ',')}}
									</td>
									<td class="shoping__cart__item__close">
										<span class="icon_close"></span>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="shoping__cart__btns">
						<a href="{{route('shop')}}" class="primary-btn cart-btn">LANJUT BELANJA</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="shoping__continue">
						<div class="shoping__discount">

						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="shoping__checkout">
						<h5>Cart Total</h5>
						<ul>
{{--							<li>Subtotal <span>Rp. {{number_format()}}</span></li>--}}
							<li>Total <span>Rp. {{number_format($total, 0, ',')}}</span></li>
						</ul>
						<a href="#" class="primary-btn">LANJUTKAN PEMBAYARAN</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Shoping Cart Section End -->
@endsection

@section('script')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
        $(document).ready(function() {

            console.log("asds")
            $('.quantity-input').on('input', function() {
                console.log()
                var quantity = $(this).val();
                var price = $(this).data('price');
                var productId = $(this).data('product-id');

                console.log("Quantity: ", quantity);
                console.log("Price: ", price);
                console.log("Product ID: ", productId);

                var newTotal = price * quantity;

                // Update the total in the DOM
                $('#total-' + productId).text('Rp. ' + newTotal.toLocaleString());
            });
        });
	</script>
@endsection
