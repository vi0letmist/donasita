@extends('layouts.fixed-navbar', [
    'namePage' => 'HOMEPAGE',
    'activePage' => 'home',
])
@section('content')
    <style>
        .welcome-gal-area {
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url(../images/default.jpg);
            background-repeat: no-repeat;
            background-position: 75% 50%;
            background-size: contain; 
            height: 100vh;
        }
    </style>

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-gal-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-xl-6 offset-lg-1 col-lg-8 col-md-12 col-sm-12">
                        <h1><strong>Temukan pengumpulan </strong><br><strong>dana di *nama app*</strong></h1>
                        <p>Bantu orang lain dengan menyumbang untuk <br> penggalangan dana mereka, 
                        atau mulai penggalangan <br> untuk seseorang yang Anda sayangi.</p>   
                        <a href="#features" class="main-button-slider">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->
    
    <!-- ***** Features Small End ***** -->

    
    <!-- ***** Discover near Start ***** -->
    <section class="section padding-bottom-60 colored">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 padding-bottom-30">
                    <h6><b>JELAJAHI PENGGALANGAN DANA</b></h6>
                    <h4><b>Penggalangan dana untuk *nama kategori*</b></h4>
                </div>
                <!-- ***** Features Small Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="features-populer-item">
                        <div class="populer">
                            <img src="assets/images/eduard.jpg" alt="">
                        </div>
                        <h5 class="features-title"><b>Penanganan Coronavirus</b></h5>
                        <p>Customize anything in this template to fit your website needs</p>
                        <p class="lastdonate">donasi terakhir 10 menit yang lalu</p>
                        <div class="bar">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                        </div>
                        <div class="donateprog">
                            <p><b>Rp. 900.000</b> dari 10 jt</p>
                        </div>
                    </div>
                </div>
                <!-- ***** Features Small Item End ***** -->

                <!-- ***** Features Small Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="features-populer-item">
                        <div class="populer">
                            <img src="assets/images/eduard.jpg" alt="">
                        </div>
                        <h5 class="features-title"><b>Penanganan Coronavirus</b></h5>
                        <p>Customize anything in this template to fit your website needs</p>
                        <p class="lastdonate">donasi terakhir 10 menit yang lalu</p>
                        <div class="bar">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                        </div>
                        <div class="donateprog">
                            <p><b>Rp. 900.000</b> dari 10 jt</p>
                        </div>
                    </div>
                </div>
                <!-- ***** Features Small Item End ***** -->

                <!-- ***** Features Small Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="features-populer-item">
                        <div class="populer">
                            <img src="assets/images/eduard.jpg" alt="">
                        </div>
                        <h5 class="features-title"><b>Penanganan Coronavirus</b></h5>
                        <p>Customize anything in this template to fit your website needs</p>
                        <p class="lastdonate">donasi terakhir 10 menit yang lalu</p>
                        <div class="bar">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                        </div>
                        <div class="donateprog">
                            <p><b>Rp. 900.000</b> dari 10 jt</p>
                        </div>
                    </div>
                </div>
                <!-- ***** Features Small Item End ***** -->

                <!-- ***** Features Small Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="features-populer-item">
                        <div class="populer">
                            <img src="assets/images/eduard.jpg" alt="">
                        </div>
                        <h5 class="features-title"><b>Penanganan Coronavirus</b></h5>
                        <p>Customize anything in this template to fit your website needs</p>
                        <p class="lastdonate">donasi terakhir 10 menit yang lalu</p>
                        <div class="bar">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                        </div>
                        <div class="donateprog">
                            <p><b>Rp. 900.000</b> dari 10 jt</p>
                        </div>
                    </div>
                </div>
                <!-- ***** Features Small Item End ***** -->

                <!-- ***** Features Small Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="features-populer-item">
                        <div class="populer">
                            <img src="assets/images/eduard.jpg" alt="">
                        </div>
                        <h5 class="features-title"><b>Penanganan Coronavirus</b></h5>
                        <p>Customize anything in this template to fit your website needs</p>
                        <p class="lastdonate">donasi terakhir 10 menit yang lalu</p>
                        <div class="bar">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                        </div>
                        <div class="donateprog">
                            <p><b>Rp. 900.000</b> dari 10 jt</p>
                        </div>
                    </div>
                </div>
                <!-- ***** Features Small Item End ***** -->

                <!-- ***** Features Small Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="features-populer-item">
                        <div class="populer">
                            <img src="assets/images/eduard.jpg" alt="">
                        </div>
                        <h5 class="features-title"><b>Penanganan Coronavirus</b></h5>
                        <p>Customize anything in this template to fit your website needs</p>
                        <p class="lastdonate">donasi terakhir 10 menit yang lalu</p>
                        <div class="bar">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                        </div>
                        <div class="donateprog">
                            <p><b>Rp. 900.000</b> dari 10 jt</p>
                        </div>
                    </div>
                </div>
                <!-- ***** Features Small Item End ***** -->

                <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                    <button type="button" class="btn seeall-gal-button">
                        Lihat Semua
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Discover near End ***** -->
    
   @endsection