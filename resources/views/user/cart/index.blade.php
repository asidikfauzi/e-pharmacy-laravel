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
											<div class="pro-qty quantity-input" data-product-id="{{$value->id}}" data-price="{{$value->price}}">
												<input type="text" name="jumlah" class="quantity-input" value="{{$value->total_quantity}}">
											</div>
										</div>
									</td>
									<td class="shoping__cart__total" id="total-{{$value->id}}">
										Rp. {{number_format($value->price * $value->total_quantity, 0, ',')}}
									</td>
									<td class="shoping__cart__item__close modal-deletetab" data-id="{{$value->id_cart}}">
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
					<form method="POST" action="{{route('user.payment.store')}}">
						@csrf
						<div class="shoping__checkout">
							<h5>Cart Total</h5>
							<ul>
								<li>Total <span id="cart-total-amount">Rp. {{number_format($total, 0, ',')}}</span></li>
							</ul>
							<button type="submit" class="btn primary-btn" style="width: 100%">LANJUTKAN PEMBAYARAN</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Shoping Cart Section End -->
@endsection

@section('script')
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
        $(document).ready(function() {
            function updateTotal(element) {
                var quantity = element.find('input.quantity-input').val();
                var price = element.data('price');
                var productId = element.data('product-id');

                var newTotal = price * quantity;

                // Update the total in the DOM
                $('#total-' + productId).text('Rp. ' + newTotal.toLocaleString());

                updateCartTotal();
            }

            function updateCartTotal() {
                var cartTotal = 0;
                $('.shoping__cart__total').each(function() {
                    var totalText = $(this).text().replace('Rp. ', '').replace(/,/g, '');
                    var totalValue = parseFloat(totalText) || 0;
                    cartTotal += totalValue;
                });
                $('#cart-total-amount').text('Rp. ' + cartTotal.toLocaleString());
            }

            // Handle click on div
            $('.pro-qty').on('click', function() {
                updateTotal($(this));
            });

            // Handle input change on input field
            $('input.quantity-input').on('input', function() {
                updateTotal($(this).closest('.pro-qty'));
            });

            $("body").on("click", ".modal-deletetab", function() {
                var itemId = $(this).attr('data-id');
                swal({
                    title: "Yakin?",
                    text: "kamu akan menghapus data ini ?",
                    icon: "warning",
                    buttons: ["Batal", "OK"],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location = "/user/chart/delete/"+itemId
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data Tidak Jadi dihapus");
                    }
                });
            });
        });
	</script>
@endsection

