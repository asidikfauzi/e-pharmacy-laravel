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
									<h3 class="mb-4">Register</h3>
								</div>
							</div>
							@error('error')
							<div style="font-size: 12px; color: red">{{ $message }}</div>
							@enderror
							<form method="POST" action="{{route('register')}}">
								@csrf
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="username">Email</label>
									<input type="email" name="email" class="form-control" required>
									@error('email')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label class="form-control-placeholder" for="password">Password</label>
									<input id="password-field" type="password" name="password" class="form-control" required>
									@error('password')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label class="form-control-placeholder" for="confirm-password">Confirm Password</label>
									<input id="confirm-password-field" type="password" name="confirm_password" class="form-control" required>
									@error('confirm_password')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<hr>
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="nama">Nama Lengkap</label>
									<input type="text" name="nama" class="form-control" required>
									@error('nama')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="no_telp">No Telephone</label>
									<input type="number" name="no_telp" class="form-control" required>
									@error('no_telp')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="tgl_lahir">Tanggal Lahir</label>
									<input type="date" name="tgl_lahir" class="form-control" required>
									@error('tgl_lahir')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="jenis-kelamin">Jenis Kelamin</label>
									<div class="row">
										<div class="col-md-6">
											<input type="radio" name="jenis_kelamin" class="" value="Laki-laki"> Laki-Laki
										</div>
										<div class="col-md-6">
											<input type="radio" name="jenis_kelamin" class="" value="Perempuan"> Perempuan
										</div>
									</div>
									@error('jenis_kelamin')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<button type="submit" class="form-control-file site-btn">Register</button>
								</div>
							</form>
							<p class="text-center">Anda sudah punya akun ? <a href="{{route('login')}}">Login</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

