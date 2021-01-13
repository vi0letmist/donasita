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
                            <h5><strong>Pengaturan Umum</strong></h5>
                        </div>
                        <div class="row kelolaAll">
                            <!-- ***** Features Small Item Start ***** -->
                            @foreach($galadana as $g)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" onclick="location.href='/g/{{$g->slug}}';" style="cursor: pointer;">
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
        <div class="offset-lg-1 col-lg-10 col-md-12 col-sm-12">
            <div class="create-item">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                        <h5>Hapus Penggalangan Dana</h5>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <p style="color: #999;">You will no longer have access to this fundraiser after deleting.<br>
                        If you received donations, your donors will still be able to view a summary.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 right-all">
                        <a href="#" style="color: #d92550;text-decoration: underline!important;">
                            <strong>Hapus Galadana</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection