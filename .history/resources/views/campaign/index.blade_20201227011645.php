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
            background-image: url(../assets/images/adult-beautiful-blonde.jpg);
            background-repeat: no-repeat;
            background-position: 75% 50%;
            background-size: contain; 
            height: 100vh;
        }
        .populer {
        width: 100%;
        height: 240px;
        overflow: hidden;
        
        background-size: cover;
        background-position: center;
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
                @foreach($kategori as $k)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 kategoriBox" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" onclick="location.href='/galadana/{{$k->slug}}';" style="cursor: pointer;">
                    <div class="features-populer-item-kategori">
                        <div class="populer" style="background-image: url(../images/{{$k->gambar}});background-size: contain;background-repeat: no-repeat;">
                        </div>
                        <h5 class="features-title"><b>{{$k->nama}}</b></h5>
                    </div>
                </div>
                @endforeach
                <!-- ***** Features Small Item End ***** -->
                <div class="out"></div>
                <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                    <button type="button" class="btn seeall-gal-button">
                        Lihat Semua
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Discover near End ***** -->
    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Work Process</h1>
                            <p>Aenean nec tempor metus. Maecenas ligula dolor, commodo in imperdiet interdum, vehicula ut ex. Donec ante diam.</p>
                        </div>
                    </div>
                </div>

                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Get Ideas</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Sketch Up</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Discuss</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Revise</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Approve</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Launch</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->
   @endsection