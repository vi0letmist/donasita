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
                <a href="/galadana/{{$k->slug}}" style="display:block;">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="features-populer-item">
                        <div class="populer">
                        <img src="{{URL::asset('/images/' . $k->gambar)}}" alt="{{$k->nama}}">
                        </div>
                        <h5 class="features-title"><b>{{$k->nama}}</b></h5>
                    </div>
                </div>
                </a>
                @endforeach
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