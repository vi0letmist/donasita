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
  cursor: pointer;
  display: block;
  background: #FFFFFF;
  box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.10);
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
  padding: 20px 0 20px 0;
  text-align: center;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  position: relative;
  margin-bottom: 30px;
  overflow-wrap: break-word;
}
.features-populer-item:hover {
  margin-top: -10px;
  box-shadow: 0 4px 52px 0 rgba(0, 0, 0, 0.20);
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
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" onclick="location.href='/kelola/{{$g->slug}}/edit';" style="cursor: pointer;">
                                <div class="features-populer-item">
                                    <div class="populer" style="background-image: url(../images/{{$g->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">
                                        
                                    </div>
                                    <h5 class="features-title"><b>{{$g->judul}}</b></h5>
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