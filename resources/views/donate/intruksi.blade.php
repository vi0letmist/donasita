@extends('layouts.navbar-nonfooter', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-7 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="create-item">
                    <h4>Intruksi Pembayaran</h4>
                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20 padding-left-1 padding-right-1">
                        <div class="intruksi-form">
                            <p class="text-center">Transfer sesuai nominal dibawah ini:</p>
                            <h3>Rp. 100.189</h3>
                            <div class="col-lg-12 intruksi-alert">
                                <i class="fas fa-exclamation-circle padding-right-10"></i>
                                <p><b>PENTING!</b> Mohon transfer tepat sampai 3 angka terakhir agar donasi terverifikan otomatis</p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 intruksi-uniq bg-disabled">
                                <div class="col-lg-12 border-bottom-10">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <p>Jumlah donasi</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right">
                                            <p>Rp. 100.189</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 padding-bottom-10">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <p>Kode unik(*)</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right">
                                            <p>189</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <small>* 3 angka terakhir akan didonasikan</small>
                            <p class="text-center padding-top-10">Pembayaran dilakukan ke rekening a/n<br>Yayasan *gusdkjga*</p>
                            <div class="col-lg-12 col-md-12 col-sm-12 intruksi-rek bg-disabled">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <img src="#">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <p class="text-center">1121092122112</p>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <p>salin</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 intruksi-rek-2">
                                <p>Transfer sebelum <b>09 April 17:29 WIB</b> atau donasi kamu otomatis dibatalkan oleh sistem</p>
                            </div>
                            <a class="share-button text-center">Bagikan</a>
                        </div>
                    </div>
                    <!-- ***** Contact Form End ***** -->
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="donate-sidebar">
                    <div class="donate-sidebar-header border-bottom-20 padding-left-0 padding-right-0">
                        <h6>Penggalangan dana pembangunan masjid an-nur</h6>
                    </div>
                    <div class="donate-sidebar-body padding-top-20">
                        <div class="populer">
                            <img src="assets/images/eduard.jpg" alt="">
                        </div>
                        <div class="sidebar-donate-header">
                            <h3><strong>Rp. 80.000.000 </strong></h3>
                            <p>terkumpul dari Rp. 400.000.000</p>
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                            <p class="padding-top-10">terkumpul dari <strong>267</strong> orang selama 4 bulan</p>
                        </div>
                    </div>
                </div>
                <h6 class="padding-bottom-20">Tentang Pengelola</h6>
                <div class="donate-sidebar">
                    <div class="donate-sidebar-header border-bottom-20 padding-left-0 padding-right-0">
                        <img src="assets/images/avatars/5.jpg" alt="">
                        <i class="far fa-envelope padding-left-2"></i>
                        <p style="font-size:12px;font-weight:500">Jaffar Jatmiko Jati</p>
                    </div>
                    <div class="donate-sidebar-body padding-top-20">
                        <div class="sidebar-donate-header"> 
                            <small>orang ini akan menerima sumbangan anda secara langsung. 
                                Semua pembayaran bersifat final dan tidak dapat dikembalikan.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection