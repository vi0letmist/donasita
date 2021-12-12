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
                    <div>Ganti Sandi Admin
                        <div class="page-title-subheading">Halaman untuk mengubah sandi admin
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('alerts.success')
        @include('alerts.errors')
        <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="header-title">Ganti Sandi</h5>
                    <form id="profilForm" method="POST" action="{{ route('profil.password') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="position-relative form-group{{ $errors->has('current_password') ? ' has-danger' : '' }}">
                                    <label for="password">Kata sandi saat ini:</label>
                                    <fieldset>
                                        <input id="password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">
                                    </fieldset>
                                    @include('alerts.feedback', ['field' => 'current_password'])
                                </div>
                                <div class="position-relative form-group{{ $errors->has('new_password') ? ' has-danger' : '' }}">
                                    <label for="password">Kata sandi baru:</label>
                                    <fieldset>
                                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="current-password">
                                    </fieldset>
                                    @include('alerts.feedback', ['field' => 'new_password'])
                                </div>
                                <div class="position-relative form-group{{ $errors->has('new_confirm_password') ? ' has-danger' : '' }}">
                                    <label>Tulis ulang kata sandi baru:</label>
                                    <fieldset>
                                    <input id="new_confirm_password" type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" required autocomplete="current-password">
                                    </fieldset>
                                    @include('alerts.feedback', ['field' => 'new_confirm_password'])
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
