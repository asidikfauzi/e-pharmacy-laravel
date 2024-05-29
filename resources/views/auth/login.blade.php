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
								<h3 class="mb-4">Login</h3>
							</div>
						</div>
						@error('error')
						<div style="font-size: 12px; color: red">{{ $message }}</div>
						@enderror
						<form method="POST" action="{{route('login')}}">
							@csrf
							<div class="form-group mt-3">
								<label class="form-control-placeholder" for="username">Email</label>
								<input type="email" name="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label class="form-control-placeholder" for="password">Password</label>
								<input id="password-field" type="password" name="password" class="form-control" required>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control-file site-btn">Login</button>
							</div>
						</form>
						<p class="text-center">Anda belum punya akun ? <a href="{{route('register')}}">Register</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

