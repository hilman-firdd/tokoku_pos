@extends('layouts.master')
@section('title','Dashboard')

@section('breadcrumb')
@parent
<li class="active"> Dashboard</li>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body text-center">
                <h1>Selamat datang</h1>
                <h2>Anda login sebagai KASIR</h2>
                <br><br>
                <a href="{{ route('transaksi.baru')}}" class="btn btn-success btn-lg">Transaksi Baru</a>
            </div>
        </div>
    </div>
</div>
<!-- /.row (main row) -->
@endsection