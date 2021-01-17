@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<style>
    html,body{
        background: #f2f2fe;
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
                        <form id="kelolaUpdate" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="edit-item-header">
                                <strong><h5>Pengaturan Umum Akun</h5></strong>
                            </div>
                            <div class="edit-item-body">
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
