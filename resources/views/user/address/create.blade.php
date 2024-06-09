@extends('layouts.header-footer')

@section('header-footer')

	<section class="banner spad">
		<div class="container">
			<div class="row justify-content-center featured__item">
				<div class="col-md-7 col-lg-5" style="background-color: #fbfcfc">
					<div class="wrap">
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Tambah Alamat</h3>
								</div>
							</div>
							@error('error')
							<div style="font-size: 12px; color: red">{{ $message }}</div>
							@enderror
							<form method="POST" action="{{route('user.address.store')}}">
								@csrf
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="username">Jalan</label>
									<input type="text" name="jalan" class="form-control" required>
								</div>
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="username">Kota</label>
									<input type="text" name="kota" class="form-control" required>
								</div>
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="username">Provinsi</label>
									<input type="text" name="provinsi" class="form-control" required>
								</div>
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="username">Kode Pos</label>
									<input type="number" name="kode_pos" class="form-control" required>
								</div>
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="username">Negara</label>
									<input type="text" name="negara" class="form-control" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control-file site-btn">Tambah Alamat</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

