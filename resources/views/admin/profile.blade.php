@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Profil</title>
    <style>
        .foto_profil img {
            max-width: 200px !important;
        }
    </style>
@endsection
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Profil Admin
                        <div class="page-title-subheading">Ini adalah profil untuk admin
                        </div>
                    </div>
                </div>
            </div>
        </div>            <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="header-title">Statistik Unggahan</h5>
                    <form id="profilForm" method="POST" action="{{ route('user.update', Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-xl-4 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 center-all padding-top-20">
                                        <div class="foto_profil">
                                            <img width="200" class="rounded-circle" src="{{ asset('assets') }}/images/avatars/{{Auth::user()->foto_profil}}" alt="foto profil" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-sm-12 padding-top-20">
                                        <div class="position-relative form-group{{ $errors->has('foto_profil') ? ' has-danger' : '' }}">
                                            <input name="foto_profil" id="foto_profil" value="{{ old('name', Auth::user()->foto_profil) }}" type="file" class="form-control" style="height:fit-content;">
                                            @include('alerts.feedback', ['field' => 'foto_profil'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-12 col-sm-12">
                                <div class="position-relative form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label for="Name" class="form-control-label">{{ __('Nama *  ') }}</label>
                                    <input name="name" id="name" value="{{ old('name', Auth::user()->name) }}" type="text" class="form-control">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="position-relative form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label for="exampleEmail" class="form-control-label">{{ __('Email *  ') }}</label>
                                    <input name="email" id="exampleEmail" value="{{ old('name', Auth::user()->email) }}" type="email" class="form-control">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="position-relative form-group{{ $errors->has('no_hp') ? ' has-danger' : '' }}">
                                    <label for="no_hp" class="form-control-label">{{ __('No. Handphone *  ') }}</label>
                                    <input name="no_hp" id="no_hp" value="{{ old('name', Auth::user()->no_hp) }}" type="text" class="form-control">
                                    @include('alerts.feedback', ['field' => 'foto_profil'])
                                </div>
                                <input name="role" type="hidden" class="form-control" id="role" value="{{ old('name', Auth::user()->role) }}">
                                <div class="right-all">
                                    <button class="mt-1 btn btn-primary" type="submit" id="form-submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
