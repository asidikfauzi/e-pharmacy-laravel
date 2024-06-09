@extends('layouts.header-footer')

@section('header-footer')
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.png')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Dashboard Admin</h2>
						<div class="breadcrumb__option">
							<a href="{{route('admin.index')}}">Halaman Utama</a>
							<span>Category</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection