@extends('layouts.test', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12" style="padding-top:8em;">
            <div class="center-heading">
                <h1><strong>Pembangunan Gedung Baru Pondok pesantren Tebu Ireng</strong></h1>
            </div>
        </div>
        <div class="col-md-8">
            <p>amjay</p>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="post-item">
                <div class="post-header">
                    <h3><strong>Rp. 80.000.000 </strong></h3>
                    <p>terkumpul dari Rp. 400.000.000</p>
                    <div class="progress-bar-xs progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                    <p><strong>20%</strong> tercapai</p>
                </div>
                <div class="post-body">
                <a href="#" class="donate-button">Donasi Sekarang</a>
                </div>
                <div class="post-footer">
                    <a href="#" class="main-button">Purchase Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection