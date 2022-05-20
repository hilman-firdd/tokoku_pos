@extends('layouts.master')
@section('title','Transaksi Penjualan')

@section('breadcrumb')
@parent
<li class="active"> Transaksi Penjualan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <div class="alert alert-success alert-dismissible">
                    <i class="fa fa-check icon">
                        Data Transaksi telah selesai.
                    </i>
                </div>
            </div>
            <div class="box-footer">
                @if( $setting->tipe_nota == 1)
                <button class="btn btn-warning btn-flat"
                    onclick="notaKecil('{{ route('transaksi.nota_kecil')}}', 'Nota Kecil')">Cetak Ulang Nota</button>
                @else
                <button class="btn btn-warning btn-flat"
                    onclick="notaBesar('{{ route('transaksi.nota_besar')}}', 'Nota PDF')">Cetak Ulang Nota</button>
                @endif
                <a href="{{ route('transaksi.baru') }}" class="btn btn-primary btn-flat">Transaksi Baru</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

<script>
    function notaKecil(url, title){
        popupCenter(url, title,625 ,500 );
    }

    function notaBesar(url, title){
        popupCenter(url, title, 900 , 675);
    }

    function popupCenter (url, title, w, h ) {
        // Fixes dual-screen position                             Most browsers      Firefox
        const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
        const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;

        const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        const systemZoom            = width / window.screen.availWidth;
        const left          = (width - w) / 2 / systemZoom + dualScreenLeft
        const top           = (height - h) / 2 / systemZoom + dualScreenTop
        const newWindow             = window.open(url, title, 
        `
            scrollbars=yes,
            width=${w / systemZoom}, 
            height=${h / systemZoom}, 
            top=${top}, 
            left=${left}
        `
        );

        if (window.focus) newWindow.focus();
    }
</script>

@endpush