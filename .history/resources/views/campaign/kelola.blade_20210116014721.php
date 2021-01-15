@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<style>
    html,body{
        background: #f2f2fe;
    }
    .populer{
        width: 100%;
        height: 200px;
    }
    .features-populer-item {
        cursor: default;
        box-shadow: 0 2px 20px 0 rgba(0, 0, 0, 0.06);
    }
    .features-populer-item:hover {
        margin-top: 0;
        box-shadow: 0 4px 30px 0 rgba(0, 0, 0, 0.12);
    }
    .center-all a{
        color:#1e1e1e;
        font-weight: bold;
        font-size: 14px;
    }
    .center-all a:hover{
        color: ;
    }
    .dot::before{
        content: "\2022";
        color: #adadad;
        font-weight: 900;
        display: inline-block; 
        width: 1.1em;
        margin-left: 3px;
    }
</style>
<div class="container padding-top-60">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="edit-item">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 sidebarKelola">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Pengaturan & Pengelolaan</li>
                            <li>
                                <a href="/kelola/galadana" class="{{ Request::is('kelola/umum') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-config"></i>
                                    Umum
                                </a>
                            </li>
                            <li>
                                <a href="/kelola/galadana" class="{{ Request::is('kelola/galadana') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-albums"></i>
                                    Galadana Anda
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 sideRight">
                        <div class="padding-top-20 border-bottom-10">
                            <h5>Kelola Penggalangan dana Anda</h5>
                        </div>
                        <div class="row kelolaAll">
                            <!-- ***** Features Small Item Start ***** -->
                            @foreach($galadana as $g)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                                <div class="features-populer-item">
                                    <div class="populer" style="background-image: url(../images/{{$g->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">
                                        
                                    </div>
                                    <h5 class="features-title"><b>{{$g->judul}}</b></h5>
                                    <div class="center-all">
                                        <a href="/kelola/{{$g->slug}}/ubah">
                                            <i class="fas fa-pencil-alt"></i> Ubah
                                        </a>
                                        <a href="/kelola/{{$g->slug}}/lihat" class="dot">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- ***** Features Small Item End ***** -->
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection