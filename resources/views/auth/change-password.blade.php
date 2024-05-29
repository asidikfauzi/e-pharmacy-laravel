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
									<h3 class="mb-4">Ganti Password</h3>
								</div>
							</div>
							@error('error')
							<div style="font-size: 12px; color: red">{{ $message }}</div>
							@enderror
							<form method="POST" action="{{route('password')}}">
								@csrf
								@method('PUT')
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="username">Password Saat Ini</label>
									<input type="password" name="old_password" class="form-control" required>
									@error('old_password')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label class="form-control-placeholder" for="password">Password Baru</label>
									<input id="password-field" type="password" name="new_password" class="form-control" required>
									@error('new_password')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label class="form-control-placeholder" for="password">Konfirmasi Password Baru</label>
									<input id="password-field" type="password" name="confirm_password" class="form-control" required>
									@error('confirm_password')
									<div style="font-size: 12px; color: red">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<button type="submit" class="form-control-file site-btn">Ganti Password</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

