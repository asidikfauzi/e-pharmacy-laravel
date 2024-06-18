@extends('layouts.header-footer')

@section('header-footer')

	<section class="banner spad">
		<div class="container">
			<div class="row justify-content-center featured__item">
				<div class="col-md-12 col-lg-12" style="background-color: #fbfcfc">
					<div class="wrap">
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Tambah Produk</h3>
								</div>
							</div>
							@error('error')
							<div style="font-size: 12px; color: red">{{ $message }}</div>
							@enderror
							<form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-placeholder" for="username">Nama Produk</label>
											<input type="text" name="nama" class="form-control" required>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="username">Harga Produk</label>
											<input type="number" name="price" class="form-control" required>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="username">Stok Produk</label>
											<input type="number" name="stok" class="form-control" required>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Deskripsi Produk</label>
											<textarea id="password-field" type="" name="deskripsi" rows="4" cols="50" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Indikasi Umum Produk</label>
											<textarea id="password-field" type="" name="indikasi_umum" rows="4" cols="50" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Komposisi Produk</label>
											<textarea id="password-field" type="" name="komposisi" rows="4" cols="50" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Dosis Produk</label>
											<textarea id="password-field" type="" name="dosis" rows="4" cols="50" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Aturan Pakai Produk</label>
											<input type="text" name="aturan_pakai" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Perhatian Produk</label>
											<textarea id="password-field" type="" name="perhatian" rows="4" cols="50" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Kontra Indikasi Produk</label>
											<textarea id="password-field" type="" name="kontra_indikasi" rows="4" cols="50" class="form-control"></textarea>
										</div>
										<div class="form-group">Efek Samping Produk</label>
											<textarea id="password-field" type="" name="efek_samping" rows="4" cols="50" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Golongan Produk</label>
											<input type="text" name="golongan_produk" class="form-control" required>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Kemasan Produk</label>
											<input type="text" name="kemasan" class="form-control" required>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Manufaktur Produk</label>
											<input type="text" name="manufaktur" class="form-control" required>
										</div>
										<div class="form-group">
											<label class="form-control-placeholder" for="password">Image Produk</label>
											<input type="file" name="image" class="form-control-file" required>
										</div>
										<div class="form-group destinasi-form"  id="destinasi-form-{{ $index }}">
											<label class="form-control-placeholder">Kategori Product</label>
											<select name="categories[]" class="select2" size="10">
												@foreach($categories as $value)
													<option value="{{$value->id}}">{{$value->nama}}</option>
												@endforeach
											</select>
											<div class="text-sm-right">
												<button type="button" class="btn btn-danger mt-1 delete-destinasi">-</button>
											</div>
										</div>
										<div class="text-sm-right" >
											<button type="button" id="add-destinasi" class="btn btn-dark mb-3">+</button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control-file site-btn">Tambah Produk</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('script')
	<script>
        $(document).ready(function () {
            $("#add-destinasi").click(function () {
                var lastDestinasiForm = $(".destinasi-form").last();
                var newDestinasiForm = lastDestinasiForm.clone();
                var newIndex = $(".destinasi-form").length;

                newDestinasiForm.attr('id', 'destinasi-form-' + newIndex);
                newDestinasiForm.find("input").val("");

                lastDestinasiForm.after(newDestinasiForm);
                newDestinasiForm.find(".delete-destinasi").show();
            });

            $(document).on('click', '.delete-destinasi', function () {
                $(this).closest('.destinasi-form').remove(); // Menghapus form tujuan yang terkait
            });
        });

	</script>
@endsection
