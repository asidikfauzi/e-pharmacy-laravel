@extends('layouts.header-footer')

@section('header-footer')
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.png')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Pembayaran</h2>
						<div class="breadcrumb__option">
							<a href="{{route('admin.index')}}">Halaman Utama</a>
							<span>Pembayaran</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Checkout Section Begin -->
	<section class="checkout spad">
		<div class="container">
			<div class="checkout__form">
				<h4>Detil Pemesan</h4>
				<form action="{{route('user.payment.update', $payments->id)}}" method="POST">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-lg-8 col-md-6">
							<div class="row">
								<div class="col-lg-2">
									<div class="checkout__input">
										<p>Nama</p>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="checkout__input">
										<p>: {{$person->nama}}</p>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="checkout__input">
										<p>No Telp</p>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="checkout__input">
										<p>: {{$person->no_telp}}</p>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="checkout__input">
										<p>Tanggal lahir</p>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="checkout__input">
										<p>: {{$person->tgl_lahir}}</p>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="checkout__input">
										<p>Jenis Kelamin</p>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="checkout__input">
										<p>: {{$person->jenis_kelamin}}</p>
									</div>
								</div>
							</div>
							<div class="checkout__input">
								<div class="checkout__input">
									<p>Address<span>*</span></p>
									<select class="checkout__input">
										<option value="">Pilih Alamat</option>
										@foreach($addresses as $value)
											<option value="{{$value->id}}">{{$value->jalan}}, {{$value->kota}}, {{$value->provinsi}}, {{$value->kode_pos}}, {{$value->negara}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="checkout__input">
								<div class="checkout__input">
									<p>Upload Bukti Transaksi<span>*</span></p>
									<input type="file" name="image" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="checkout__order">
								<h4>Orderan Kamu</h4>
								<div class="checkout__order__products">Produk <span>Total</span></div>
								<ul>
									@foreach($listProducts as $value)
									<li>{{ Illuminate\Support\Str::limit($value->nama, 20, '...') }}<span>Rp.{{number_format($value->price, 0,',')}}</span></li>
									@endforeach
								</ul>
								<div class="checkout__order__total">Total <span>Rp.{{number_format($payments->total, 0, ',')}}</span></div>
								<button type="submit" class="site-btn">PLACE ORDER</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- Checkout Section End -->
@endsection