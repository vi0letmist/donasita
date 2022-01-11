@extends('layouts.dashboard', [
    'namePage' => 'manajemen-user',
    'activePage' => 'manajemen-user',
])
@section('title')
    <title>Edit user</title>
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
                    <div>Edit user
                        <div class="page-title-subheading">Halaman ini berisikan detail user untuk diedit.
                        </div>
                    </div>
                </div>
                <!-- <div class="page-title-actions">
                     <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <button type="button" aria-haspopup="true" aria-expanded="false" class="btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buat Kategori
                    </button>
                </div> -->    </div>
        </div>
        @include('alerts.success')
        @include('alerts.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Edit user</h5>
                        <form id="createForm" method="POST" action="{{ route('manajemen-user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group{{ $errors->has('foto_profil') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="foto_profil">{{ __('Foto Profil *  ') }}</label>
                                        <fieldset>
                                            <input name="foto_profil" id="foto_profil" type="file" class="form-control-file" value="{{ old('foto_profil', $user->foto_profil) }}">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'foto_profil'])
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="name">{{ __('Nama *  ') }}</label>
                                        <fieldset>
                                            <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control" id="name">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="email">{{ __('Email *  ') }}</label>
                                        <fieldset>
                                            <input name="email" value="{{ old('email', $user->email) }}" type="text" class="form-control" id="email">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group{{ $errors->has('no_hp') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="no_hp">{{ __('Nomer Handphone *  ') }}</label>
                                        <fieldset>
                                            <input name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" type="text" class="form-control" id="no_hp">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'no_hp'])
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="role">{{ __('Role *  ') }}</label>
                                        <fieldset>
                                            <div class="position-relative form-check"><label class="form-check-label"><input name="role" id="role" type="radio" value="admin" class="form-check-input"{{$user->role == "admin" ? 'checked' : ''}}> Admin</label>
                                            </div>
                                            <div class="position-relative form-check"><label class="form-check-label"><input name="role" id="role" type="radio" value="pengguna" class="form-check-input" {{$user->role == "pengguna" ? 'checked' : ''}}> Pengguna
                                            </label></div>
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'role'])
                                    </div>
                                </div>
                            </div>
                            <button class="mt-1 btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
