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
            background-image: url(../images/{{$kategori->gambar}});
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
                        <h1><strong>Dapatkan Bantuan Untuk </strong><br><strong>Penggalangan Dana {{$kategori->nama}}</strong></h1>
                        <p>Dengan *Nama App*, Anda bisa mendapatkan bantuan dalam biaya {{$kategori->nama}}</p>   
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
                @foreach($galadana as $g)
                <!-- ***** Features Small Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="features-populer-item">
                        <div class="populer">
                            <img src="{{URL::asset('/images/' . $g->gambar)}}" alt="{{$g->judul}}">
                        </div>
                        <h5 class="features-title"><b>{{$g->judul}}</b></h5>
                        <p>{!! html_entity_decode(\Illuminate\Support\Str::limit($g->cerita, $limit = 80, $end = '...')) !!}</p>
                        <p class="lastdonate">donasi terakhir 10 menit yang lalu</p>
                        <div class="bar">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $g->progres_capaian / $g->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$g->progres_capaian / $g->target_capaian * 100}}%"></div>
                            </div>
                        </div>
                        <div class="donateprog">
                            <p><b>Rp. {{ $g->progres_capaian }}</b> dari Rp. {{ $g->target_capaian }}</p>
                        </div>
                    </div>
                </div>
                <!-- ***** Features Small Item End ***** -->
                @endforeach

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