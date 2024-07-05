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
                            <span>Pesanan Masuk</span>
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
                            Pesanan Masuk
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <select class="form control col-md-2 p-1 m-2" name="month" id="month">
                                    <option value="">Pilih Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>

                                <select class="form control col-md-2 p-1 m-2" name="year" id="year">
                                    <option value="">Pilih Tahun</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>

                            <table class="table table-bordered data-tables" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nota</th>
                                    <th>Pemesan</th>
                                    <th>Total</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Detail</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="6" style="text-align:right">Total:</th>
                                    <th id="total-payments"></th>
                                </tr>
                                </tfoot>
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
            function fetch_data(month = '', year = '')
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
                    destroy: true,
                    paging: true,
                    responsive: true,
                    scrollX: true,
                    filter: true,
                    lengthChange: false,
                    scrollCollapse: true,
                    fixedColumns: { heightMatch: 'none' },
                    ajax: {
                        url:"{{ route('admin.recap.getData') }}",
                        data: { month: month, year: year },
                        // dataSrc: function(json) {
                        //     // You can access json.total, json.total_credit, json.total_balance here
                        //     $('#total-payments').text(json.total_payments);
                        //     return json.data;
                        // }
                    },
                    columns:[
                        {data: 'id',
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {data: 'nota', name: 'nota'},
                        {data: 'nama', name: 'nama'},
                        {data: 'total', name: 'total'},
                        {data: 'image', name: 'image'},
                        {data: 'show', name: 'show'},
                    ],
                    // footerCallback: function (row, data, start, end, display) {
                    //     var api = this.api();
                    //
                    //     // Function to remove formatting and get integer data for summation
                    //     var intVal = function (i) {
                    //         return typeof i === 'string' ?
                    //             i.replace(/[\$,]/g, '') * 1 :
                    //             typeof i === 'number' ?
                    //                 i : 0;
                    //     };
                    //
                    //     // Total over all pages
                    //     var totalPayments = api
                    //         .column(7)
                    //         .data()
                    //         .reduce(function (a, b) {
                    //             return intVal(a) + intVal(b);
                    //         }, 0);
                    //
                    //     // Update footer
                    //     $(api.column(7).footer()).html('Rp. ' + totalPayments.toLocaleString('id-ID'));
                    // }
                });
            }

            $('#month, #year').change(function() {
                var month = $('#month').val();
                var year = $('#year').val();
                fetch_data(month, year);
            });

            $(document).on('click', '.show-payment', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "/admin/order/" + id,
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
