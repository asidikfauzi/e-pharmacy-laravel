@extends('layouts.header-footer')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@section('header-footer')
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.png')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>History Pesanan</h2>
						<div class="breadcrumb__option">
							<a href="{{route('user.index')}}">Halaman Utama</a>
							<span>History</span>
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
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-table me-1"></i>
							History
						</div>
						<div class="card-body">
							<table class="table table-bordered data-tables" style="width: 100%">
								<thead>
								<tr>
									<th>No.</th>
									<th>Nota</th>
									<th>Bukti Transaksi</th>
									<th>Alamat</th>
									<th>Total</th>
									<th>Status</th>
									<th>Show</th>
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

	<!-- Add this section before the closing body tag -->
	<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="paymentModalLabel">Detil Pembelian</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- This is where the payment details will be displayed -->
					<div id="paymentDetails"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


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
                        url:"{{ route('user.history.getData') }}",
                    },
                    columns:[
                        {data: 'id',
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {data: 'nota', name: 'nota'},
                        {data: 'image', name: 'image'},
                        {data: 'alamat', name: 'alamat'},
                        {data: 'total', name: 'total'},
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data, type, row) {
                                if (data == 0 || data == false) {
                                    return '<span style="color: red;">Menunggu</span>';
                                } else {
                                    return '<span style="color: green;">Sukses</span>';
                                }
                            }
                        },
                        {data: 'show', name: 'show'},
                    ]
                });
            }

            $(document).on('click', '.show-payment', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('user.history.show') }}",
                    method: 'GET',
                    data: {id: id},
                    success: function(response) {
                        $('#paymentDetails').html(response);
                        $('#paymentModal').modal('show');
                    }
                });
            });

        });
	</script>

@endsection
