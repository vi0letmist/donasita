@extends('layouts.fixed-navbar', [
    'namePage' => 'PeduliSantri: aplikasi penggalangan dana',
    'activePage' => 'home',
])
@section('title')
    <title>PeduliSantri: Aplikasi Penggalangan Dana</title>
@endsection
@section('content')
    <style>
        .populer{
            width: 100%;
            height: 200px;
        }
    </style>
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <h1>Galang dana untuk orang yang anda <strong>sayangi</strong><br>dan membantu <strong>mereka</strong></h1>
                        <p>PeduliSantri adalah aplikasi yang berguna untuk mempertemukan mereka yang membutuhkan bantuan dengan para dermawan</p>
                        <a href="#features" class="main-button-slider">Telusuri Lebih Jauh</a>
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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    @foreach($latest as $l)
                    @if($l->id == $popularity[0] || $l->id == $popularity[1] || $l->id == $popularity[2])
                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-4 col-md-4 col-sm-4" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" onclick="location.href='/g/{{$l->slug}}';" style="cursor: pointer;">
                        <div class="features-populer-item">
                            <div class="populer" style="background-image: url(../images/{{$l->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">

                            </div>
                            <h5 class="features-title"><b>{{$l->judul}}</b></h5>
                            <div class="desc-ngitem">
                            {!! html_entity_decode(\Illuminate\Support\Str::limit($l->cerita, $limit = 80, $end = '...')) !!}
                            </div>
                            @if(!$donasi->isEmpty())
                            @foreach($donasi as $d)
                            @if($l->id == $d->galadana_id)
                            <p class="lastdonate">donasi terakhir {{\Carbon\Carbon::createFromTimeStamp(strtotime($d->updated_at))->locale('id')->diffForHumans()}}</p>
                            @break
                            @endif
                            @endforeach
                            @endif
                            <div class="bar">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $l->progres_capaian / $l->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$l->progres_capaian / $l->target_capaian * 100}}%"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-12 col-sm-12 donateprog">
                                    <p><b>@currency($l->progres_capaian)</b><br>
                                    dari <b>@currency($l->target_capaian)</b>
                                    </p>
                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12 donateprog right-all">
                                    <p><strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime($l->batas_waktu))->locale('id')->diffInDays()}}</strong> hari lagi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <!-- ***** Features Small Item End ***** -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-bottom-40 right-all">
                        <a href="/galadana" style="color:#777777;">
                        Lihat Semua <i class="fas fa-angle-right"></i></a>
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
                        <p>Syukurlah, kita semua memiliki kekuatan untuk melakukan sesuatu dan membuat perbedaan. Di sini, di PeduliSantri, kami
                        memberdayakan individu, organisasi, dan komunitas untuk melangkah maju dalam menghadapi wabah COVID-19 dan
                        membantu mereka yang paling membutuhkannya.</p>
                        <p>Mulai PeduliSantri untuk mengumpulkan uang untuk membantu diri sendiri dan orang lain selama masa sulit ini. Baca posting blog kami
                        Penggalangan Dana untuk Coronavirus Relief: Bagaimana Anda Dapat Membantu Perjuangan untuk informasi lebih lanjut.</p>
                        <a href="/galadana/create" class="main-button">Mulai PeduliSantri</a>
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
                @foreach($galadana as $g)
                <div class="col-lg-4 col-md-4 col-sm-4" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" onclick="location.href='/g/{{$g->slug}}';" style="cursor: pointer;">
                    <div class="features-populer-item">
                        <div class="populer" style="background-image: url(../images/{{$g->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">

                        </div>
                        <h5 class="features-title"><b>{{$g->judul}}</b></h5>
                        <div class="desc-ngitem">
                        {!! html_entity_decode(\Illuminate\Support\Str::limit($g->cerita, $limit = 80, $end = '...')) !!}
                        </div>
                        @if(!$donasi->isEmpty())
                        @foreach($donasi as $d)
                        @if($g->id == $d->galadana_id)
                        <p class="lastdonate">donasi terakhir {{\Carbon\Carbon::createFromTimeStamp(strtotime($d->updated_at))->locale('id')->diffForHumans()}}</p>
                        @break
                        @endif
                        @endforeach
                        @endif
                        <div class="bar">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $g->progres_capaian / $g->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$g->progres_capaian / $g->target_capaian * 100}}%"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-sm-12 donateprog">
                                <p><b>@currency($g->progres_capaian)</b><br>
                                dari <b>@currency($g->target_capaian)</b>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 donateprog right-all">
                                <p><strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime($g->batas_waktu))->locale('id')->diffInDays()}}</strong> hari lagi</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- ***** Features Small Item End ***** -->
                <div class="col-lg-12 col-md-12 col-sm-12 padding-bottom-40 right-all">
                    <a href="/galadana" style="color:#777777;">
                    Lihat Semua <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Discover near End ***** -->

   @endsection
