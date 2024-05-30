@extends('layouts.header-footer')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
							<span>Produk</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="banner spad">
		<div class="container">
			<div class="row justify-content-center featured__item">
				<div class="container-fluid px-4">
					<ol class="mb-4">
						<a href="{{route('admin.product.create')}}" class="btn site-btn">Tambah Produk</a>
					</ol>
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-table me-1"></i>
							Produk
						</div>
						<div class="card-body">
							<table class="table table-bordered data-tables" style="width: 100%">
								<thead>
								<tr>
									<th>No.</th>
									<th>Image Produk</th>
									<th>Nama Produk</th>
									<th>Harga Produk</th>
									<th>Stok Produk</th>
									<th>Golongan Produk</th>
									<th>Kategori Produk</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
								</thead>
								<tbody>
								<tr>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection


@section('script')
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function(){
            fetch_data();
            function fetch_data()
            {
                $('.data-tables').DataTable({
                    language: {
                        searchPlaceholder: 'Search...',
                        sEmptyTable:   'Tidak ada data yang tersedia pada tabel ini',
                        sProcessing:   'Sedang memproses...',
                        sZeroRecords:  'Tidak ditemukan data yang sesuai',
                        sInfo:         'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
                        sInfoEmpty:    'Menampilkan 0 sampai 0 dari 0 entri',
                        sInfoFiltered: '(disaring dari _MAX_ entri keseluruhan)',
                        sInfoPostFix:  '',
                        sSearch:       '',
                        sUrl:          '',
                        oPaginate: {
                            sFirst:    'Pertama',
                            sPrevious: 'Sebelumnya',
                            sNext:     'Selanjutnya',
                            sLast:     'Terakhir'
                        }
                    },
                    paging: true,
                    responsive: true,
                    scrollX: true,
                    filter : true,
                    lengthChange: false,
                    scrollCollapse: true,
                    fixedColumns:   {
                        heightMatch: 'none'
                    },
                    ajax: {
                        url:"{{ route('admin.product.getData') }}",
                    },
                    columns:[
                        {data: 'id',
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {data: 'image', name: 'image'},
                        {data: 'nama', name: 'nama'},
                        {data: 'price', name: 'price'},
                        {data: 'stok', name: 'stok'},
                        {data: 'golongan_produk', name: 'golongan_produk'},
                        {data: 'categories', name: 'categories'},
                        {data: 'edit', name: 'edit'},
                        {data: 'delete', name: 'delete'},
                    ]
                });
            }

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
                        window.location = "/admin/product/"+itemId+"/destroy"
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
