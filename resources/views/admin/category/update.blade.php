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
									<h3 class="mb-4">Edit Kategori</h3>
								</div>
							</div>
							@error('error')
							<div style="font-size: 12px; color: red">{{ $message }}</div>
							@enderror
							<form method="POST" action="{{route('admin.category.update', $category->id)}}">
								@csrf
								@method('PUT')
								<div class="form-group mt-3">
									<label class="form-control-placeholder" for="username">Nama Kategori</label>
									<input type="text" name="nama" class="form-control" value="{{$category->nama}}" required>
								</div>
								<div class="form-group">
									<label class="form-control-placeholder" for="password">Deskripsi Kategori</label>
									<textarea id="password-field" type="" name="deskripsi" rows="4" cols="50" class="form-control">{{$category->deskripsi}}</textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control-file site-btn">Edit Kategori</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

