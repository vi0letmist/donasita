@extends('layouts.fixed-navbar', [
    'namePage' => 'HOMEPAGE',
    'activePage' => 'home',
])
@section('content')
    <style>
        .populer{
            width: 300px;
            height: 300px;
        }
    </style>
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <h1>We provide the best <strong>strategy</strong><br>to grow up your <strong>business</strong></h1>
                        <p>Softy Pinko is a professional Bootstrap 4.0 theme designed by Template Mo 
                        for your company at absolutely free of charge</p>
                        <a href="#features" class="main-button-slider">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->
    <section class="section home-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($latest as $l)
                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <div class="features-populer-item">
                                <div class="populer" style="background-image: url(../assets/images/adult-beautiful-blonde.jpg);background-size:cover;background-repeat: no-repeat;background-position: center;">
                                    
                                </div>
                                <h5 class="features-title"><b>{{$l->judul}}</b></h5>
                                <p>{!! html_entity_decode(\Illuminate\Support\Str::limit($l->cerita, $limit = 80, $end = '...')) !!}</p>
                                <p class="lastdonate">donasi terakhir 10 menit yang lalu</p>
                                <div class="bar">
                                    <div class="progress-bar-xs progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $l->progres_capaian / $l->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$l->progres_capaian / $l->target_capaian * 100}}%"></div>
                                    </div>
                                </div>
                                <div class="donateprog">
                                    <p><b>Rp. {{ $l->progres_capaian }}</b> dari Rp. {{ $l->target_capaian }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->
                        @endforeach
                        <div class="padding-bottom-40">
                            <a href="#">view all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->

    <!-- ***** Trending Topic Start ***** -->
    <section class="section padding-top-40 padding-bottom-60 colored" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 padding-bottom-30">
                    <h6><b>TOPIC YANG SEDANG TREN</b></h6>
                    <h4><b>Penggalangan dana untuk mengatasi Coronavirus</b></h4>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="assets/images/covid2.jpg" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <!-- <div class="col-lg-1"></div> -->
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <!-- <div class="left-heading">
                        <h2 class="section-title">Let’s discuss about you project</h2>
                    </div> -->
                    <div class="left-text">
                        <p>Seiring COVID-19 terus menyebar, semakin banyak individu, komunitas, dan seluruh negara merasakan dampaknya dalam
                        kehidupan sehari-hari mereka. Di luar krisis kesehatan global, coronavirus memiliki dampak ekonomi yang parah pada individu,
                        bisnis kecil, dan organisasi medis. </p>
                        <p>Kebutuhan mendesak akan pasokan medis, kebutuhan dasar, dan perawatan kesehatan yang berkualitas hanya meningkat karena
                        semakin banyak masyarakat yang terkena dampak COVID-19. Dan dengan ratusan ribu orang di seluruh dunia dalam karantina, ada
                        kebutuhan yang semakin besar akan dukungan finansial.
                        </p>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div> -->
            <div class="row padding-top-40">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <!-- <div class="left-heading">
                        <h2 class="section-title">We can help you to grow your business</h2>
                    </div> -->
                    <div class="left-text">
                        <p>Syukurlah, kita semua memiliki kekuatan untuk melakukan sesuatu dan membuat perbedaan. Di sini, di *namaapp*, kami
                        memberdayakan individu, organisasi, dan komunitas untuk melangkah maju dalam menghadapi wabah COVID-19 dan
                        membantu mereka yang paling membutuhkannya.</p>
                        <p>Mulai *namaapp* untuk mengumpulkan uang untuk membantu diri sendiri dan orang lain selama masa sulit ini. Baca posting blog kami
                        Penggalangan Dana untuk Coronavirus Relief: Bagaimana Anda Dapat Membantu Perjuangan untuk informasi lebih lanjut.</p>
                        <a href="#" class="main-button">Mulai *namaapp*</a>
                    </div>
                </div>
                <!-- <div class="col-lg-1"></div> -->
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="assets/images/covid1.jpg" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Trending Topic End ***** -->

    <!-- ***** Discover near Start ***** -->
    <section class="section padding-bottom-60">
        <div class="container">
            <div class="row">
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

                <div class="">
                    <a href="#">view all</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Discover near End ***** -->

    <!-- ***** Contact Us Start ***** -->
    <section class="section colored" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Talk To Us</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Maecenas pellentesque ante faucibus lectus vulputate sollicitudin. Cras feugiat hendrerit semper.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5 class="margin-bottom-30">Keep in touch</h5>
                    <div class="contact-text">
                        <p>110-220 Quisque diam odio, maximus ac consectetur eu, 10260
                        <br>auctor non lorem</p>
                        <p>You are NOT allowed to re-distribute Softy Pinko template on any template collection websites. Thank you.</p>
                    </div>
                </div>
                <!-- ***** Contact Text End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="get">
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="E-Mail Address" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->
    
   @endsection