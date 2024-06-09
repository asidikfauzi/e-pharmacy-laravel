@extends('layouts.header-footer')

@section('header-footer')
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.png')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Daftar Alamat</h2>
						<div class="breadcrumb__option">
							<a href="{{route('home')}}">Halaman Utama</a>
							<span>Alamat</span>
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
				<a href="{{route('user.address.create')}}" class="btn primary-btn mb-5">Tambah Alamat</a>
				<div class="col-lg-12">
					<div class="shoping__cart__table">
						<table>
							<thead>
							<tr>
								<th class="">Alamat</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							@foreach($address as $value)
								<tr>
									<td class="">
										{{$value->jalan}}, {{$value->kota}}, {{$value->provinsi}}, {{$value->kode_pos}}, {{$value->negara}},
									</td>
									<td class="" data-id="{{$value->id}}">
										<a href="{{route('user.address.edit', $value->id)}}"><span class="icon_pencil-edit"></span></a>
									</td>
									<td class="modal-deletetab" data-id="{{$value->id}}">
										<span class="icon_close"></span>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
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
                        window.location = "/user/address/destroy/"+itemId
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

