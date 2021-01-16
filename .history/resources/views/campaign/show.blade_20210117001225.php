@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<style>
    html,body{
        background: #f2f2fe;
    }
    .center-all a{
        color:#1e1e1e;
        font-weight: bold;
        font-size: 14px;
    }
    .center-all a:hover{
        color: #3ac47d;
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
                        <input type="hidden" class="deleteGaladanaId" value="$galadana->id">
                            <li class="app-sidebar__heading">Pengaturan & Pengelolaan</li>
                            <li>
                                <a href="/kelola/galadana" class="{{ Request::is('kelola/umum') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-config"></i>
                                    Umum
                                </a>
                            </li>
                            <li>
                                <a href="/kelola/galadana" class="{{ Request::is('kelola*') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-albums"></i>
                                    Galadana Anda
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 sideRight">
                        <form id="kelolaUpdate" method="POST" action="{{ route('kelola.update', $galadana->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="edit-item-header">
                                <strong><h5>{{ ($galadana->judul) }}</h5></strong>
                                <div class="center-all">
                                    <a href="/kelola/{{$galadana->slug}}/ubah">
                                        <i class="fas fa-pencil-alt"></i> Ubah
                                    </a>
                                    <a href="/g/{{$galadana->slug}}" class="dot">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </div>
                            </div>
                            <div class="edit-item-body">
                                <div class="edit-body-header">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ringkasan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Foto</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Cerita</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="edit-body-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('judul') ? ' has-danger' : '' }}">
                                                    <p>Judul:</p>
                                                    <fieldset>
                                                        <input name="judul" type="text" class="form-control" id="judul" value="{{ old('name', $galadana->judul) }}">
                                                    </fieldset>
                                                    @include('alerts.feedback', ['field' => 'judul'])
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('target_capaian') ? ' has-danger' : '' }}">
                                                    <p>Target:</p>
                                                    <fieldset>
                                                        <input name="target_capaian" type="text" class="form-control" id="target_capaian" value="{{ old('name',$galadana->target_capaian) }}">
                                                    </fieldset>
                                                    @include('alerts.feedback', ['field' => 'target_capaian'])
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                                    <p>Tautan penggalangan dana:</p>
                                                    <p style="color:#999;font-weight:400;"><strong>galadana/{{$galadana->slug }}</strong></p>
                                                    <fieldset>
                                                        <input name="slug" type="text" class="form-control" id="slug" value="{{ old('name',$galadana->slug) }}">
                                                    </fieldset>
                                                    @include('alerts.feedback', ['field' => 'slug'])
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                                                    <a href="/kelola/galadana" class="main-button-slider" style="margin-right: 10px;">Batalkan</a>
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">Simpan</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row padding-top-20">
                                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                                    <h5>Hapus Penggalangan Dana</h5>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <p style="color: #999;font-weight:normal;margin:auto;">You will no longer have access to this fundraiser after deleting.<br>
                                                    If you received donations, your donors will still be able to view a summary.</p>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 right-all">
                                                    <a href="#" class="deleteGaladana" data-id="{{$galadana->id}}" style="color: #d92550;text-decoration: underline!important;">
                                                        <strong>Hapus Galadana</strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="post-pict-item">
                                                <img src="{{URL::asset('/images/' . $galadana->gambar)}}" class="rounded img-fluid d-block mx-auto" alt="">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                                                    <div id="editCollapse" class="collapse in">
                                                        <div class="file-upload">
                                                            <input style="padding-top: 10px;" type="file" class="form-control btn btn-sm" name="gambar" value="{{old('name', $galadana->gambar)}}" onchange="readURL(this);" accept="image/*">
                                                            <div class="file-upload-content">
                                                                <img class="file-upload-image" src="{{URL::asset('/images/' . $galadana->gambar)}}" alt="your image" />
                                                                <div class="image-title-wrap">
                                                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">{{old('name', $galadana->gambar)}}</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                                                    <a href="/kelola/galadana" class="main-button-slider" style="margin-right: 10px;">Batalkan</a>
                                                    <fieldset>
                                                    <button type="button" class="btn edit-button" data-toggle="collapse" data-target="#editCollapse" style="margin-right: 10px;">
                                                        Ubah
                                                    </button>
                                                    </fieldset>
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">Simpan</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <fieldset>
                                                <textarea name="cerita" value="{{ old('cerita') }}" rows="6" class="cerita" id="cerita">
                                                    {{ old('name',$galadana->cerita) }}
                                                </textarea>
                                            </fieldset>
                                            @include('alerts.feedback', ['field' => 'cerita'])
                                            <div class="col-lg-12 col-md-12 col-sm-12 center-all" style="margin: 20px 10px 20px 10px;">
                                                <a href="/kelola/galadana" class="main-button-slider" style="margin-right: 10px;">Batalkan</a>
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Simpan</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection