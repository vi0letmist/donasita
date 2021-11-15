@extends('layouts.sticky-navbar')
@section('title')
    <title>Daftar di PeduliSantri</title>
@endsection
@section('content')
<style>
  html,body{
        background: #f2f2fe;
    }
  .input-group-text i{
    font-size: 16px;
    color:#3ac47d;
  }
  .invalid-feedback{
    color: #6c757d !important;
    border: none !important;
    height: 30px !important;
  }
  .invalid-feedback strong{
    font-size: 12px;
  }
</style>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<main class="py-4">
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7 padding-top-20">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1>Verifikasi Email</h1>
              <p class="text-lead">Selamat datang di PeduliSantri sebuah situs yang mempertemukan antara Donatur dan Penggalang Dana.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center padding-top-20">
        <div class="col-lg-5 col-md-7">

          <div class="login-item">
              <div class="text-center text-muted mb-4">
                <img src="{{ asset('assets') }}/images/logo1.png" alt="PeduliSantri" style="width:10em;"/>
              </div>
              <div class="register-form">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Sebelum melanjutkan, harap memeriksa email anda untuk tautan verifikasi.') }}
                {{ __('Jika anda tidak menerima email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik disini untuk meminta tautan yang lain') }}</button>.
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection
