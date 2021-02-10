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
                        <form id="kelolaUpdate" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="edit-item-header">
                                <strong><h5>Pengaturan Umum Akun</h5></strong>
                            </div>
                            <div class="edit-item-body padding-top-20">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <fieldset>
                                            <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $user->name) }}">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <fieldset>
                                            <input name="email" type="text" class="form-control" id="email" value="{{ old('name',$user->email) }}">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <fieldset>
                                            <input name="old_password" type="password" class="form-control" placeholder="Password Saat Ini" id="password" required>
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'old_password'])
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <fieldset>
                                            <input name="password" type="password" class="form-control" placeholder="Password Baru" id="password" required>
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'password'])
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
