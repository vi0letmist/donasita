@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Ganti Password Akun</title>
@endsection
@section('content')
<style>
    html,body{
        background: #f2f2fe;
    }
    .edit-item-body label{
        margin: 0 10px 4px 20px;
    }
    .foto_profil img{
        max-width: 250px;
        clip-path: circle();
        border-radius: 50%;
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
                                <a href="/kelola/umum" class="{{ Request::is('kelola/umum') ? 'mm-active' : '' }}">
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
                        <form id="kelolaUpdate" method="POST" action="{{ route('reset.password') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="edit-item-header">
                                <strong><h5>Pengaturan Umum Akun - Ganti Kata Sandi</h5></strong>
                            </div>
                            <div class="edit-item-body padding-top-20">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-right-8 padding-left-8 form-group{{ $errors->has('current_password') ? ' has-danger' : '' }}">
                                        <label for="password">Kata sandi saat ini:</label>
                                        <fieldset>
                                            <input id="password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'current_password'])
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-right-8 padding-left-8 form-group{{ $errors->has('new_password') ? ' has-danger' : '' }}">
                                        <label for="password">Kata sandi baru:</label>
                                        <fieldset>
                                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="current-password">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'new_password'])
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-right-8 padding-left-8 form-group{{ $errors->has('new_confirm_password') ? ' has-danger' : '' }}">
                                        <label>Tulis ulang kata sandi baru:</label>
                                        <fieldset>
                                        <input id="new_confirm_password" type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" required autocomplete="current-password">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'new_confirm_password'])
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 center-all">
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
