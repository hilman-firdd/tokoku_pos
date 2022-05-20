@extends('layouts.master')

@section('title')
Laporan Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d {{ tanggal_indonesia($tanggal_akhir, false)}}
@endsection

@push('css')
<link rel="stylesheet"
    href="{{asset('/admin_lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endpush


@section('breadcrumb')
@parent
<li class="active"> Laporan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="updatePeriode()" class="btn btn-info btn-xs btn-flat"><i class="fa fa-plus-circle"></i>
                    Periode</button>
                <a href="{{ route('laporan.export_pdf', [$tanggal_awal, $tanggal_akhir]) }}" target="_blank"
                    class="btn btn-success btn-xs btn-flat"><i class="fa fa-file-excel-o"></i>
                    Export PDF</a>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Penjualan</th>
                        <th>Pembelian</th>
                        <th>Pengeluaran</th>
                        <th>Pendapatan</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@includeIf('laporan.form')
@endsection

@push('script')
<script src="{{asset('/admin_lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}">
</script>
<script>
    let table;
    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('laporan.data', [$tanggal_awal, $tanggal_akhir]) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'tanggal'},
                {data: 'penjualan'},
                {data: 'pembelian'},
                {data: 'pengeluaran'},
                {data: 'pendapatan'}
            ],
            dom: 'Brt',
            bSort: false,
            bPaginate: false
        });

        $('.datepicker').datepicker({
            format : 'yyyy-mm-dd',
            autoclose: true
        });

        // $('#modal-form').validator().on('submit', function (e) {
        //     if (! e.preventDefault()) {
        //         $('#modal-form form').submit();
        //     }
        // });

    });

    function updatePeriode(url) {
        $('#modal-form').modal('show');
    }  
</script>
@endpush