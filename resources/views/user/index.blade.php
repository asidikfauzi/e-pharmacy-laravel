@extends('layouts.header-footer')

@section('header-footer')
	<style>
        .btn_upload {padding: 1px; text-align: center; position: relative; overflow: hidden; white-space: nowrap;}
        .btn_upload input {position: absolute; width: 100%; width: 100%; height: 100%; cursor: pointer; opacity: 0;}
	</style>
	<section class="ftco-section">
		<div class="container py-5">
			<form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-lg-4">
						<div class="card mb-4">
							<div class="card-body text-center">
								<a href="{{asset('assets/images/user/'. $user->image)}}" target="_blank">
									<img src="{{asset('assets/images/user/'. $user->image)}}" alt="image"
									     class="img-fluid" style="width: 150px; max-height: 150px">
								</a>
								<div class="col-lg-12 mt-3">
									<div class="btn btn-primary">
										<div class="btn_upload">
											<input type="file" id="upload_file" name="image">
											Upload Foto
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card mb-4">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4">
										<p class="mb-0">Nama Lengkap</p>
									</div>
									<div class="col-sm-8">
										<input type="text" name="nama" class="mb-0 w-100" value="{{$user->nama}}" placeholder="Nama Lengkap">
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-4">
										<p class="mb-0">No Telp</p>
									</div>
									<div class="col-sm-8">
										<input type="number" name="no_telp" class="mb-0 w-100" value="{{$user->no_telp}}" placeholder="No Telephone">
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-4">
										<p class="mb-0">Tanggal Lahir</p>
									</div>
									<div class="col-sm-8">
										<input type="date" name="tgl_lahir" class="mb-0 w-100" value="{{$user->tgl_lahir}}" placeholder="Tgl Lahir">
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-4">
										<p class="mb-0">Jenis Kelamin</p>
									</div>
									<div class="col-sm-8">
										<select id="jenis_kelamin" name="jenis_kelamin" class="text-muted mb-0 w100">
											<option value="">--Pilih Jenis Kelamin--</option>
											<option value="Laki-laki" {{ $user->jenis_kelamin == "Laki-laki" ? 'selected' : '' }}>Laki-laki</option>
											<option value="Perempuan" {{ $user->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
										</select>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-4">
										<p class="mb-0">Bio</p>
									</div>
									<div class="col-sm-8">
										<input type="text" name="bio" class="mb-0 w-100" value="{{$user->bio}}" placeholder="Alamat">
									</div>
								</div>
								<hr>
								<div class="row mt-3">
									<div class="col-sm-12">
										<button class="btn primary-btn mb-0 float-right">Simpan</button>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
@endsection
