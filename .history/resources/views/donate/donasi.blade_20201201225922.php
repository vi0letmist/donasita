@extends('layouts.navbar-nonfooter', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-7 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="create-item padding-left-0 padding-right-0">
                    <h4>Masukkan Nominal target penggalangan dana</h4>
                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-12 col-md-12 col-sm-12 center-all padding-top-20 padding-left-0 padding-right-0">
                        <div class="create-form">
                            <form id="create" action="" method="get">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 price">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                    <fieldset>
                                                        <input name="target" type="text" class="form-control" id="target" placeholder="100.000" required="" autofocus>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 padding-left-4 padding-right-1">
                                        <fieldset>
                                            <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Penggalangan Dana" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 padding-left-1 padding-right-4">
                                        <fieldset>
                                            <input name="penerima" type="email" class="form-control" id="penerima" placeholder="Untuk siapa kamu mengumpulkan dana?" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left-4 padding-right-4">
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" name="remember" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">
                                                <span class="text-muted backrer" style="font-size:14px!important;">Sembunyikan nama saya (donasi anonim)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left-4 padding-right-4 padding-top-20">
                                        <fieldset>
                                            <textarea name="message" rows="6" class="form-control backrer" id="message" placeholder="Your Message" required="" style="border: 1px solid #ccd4da !important; "></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 center-all padding-top-10">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="donate-button">Lanjutkan Pembayaran</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ***** Contact Form End ***** -->
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="donate-sidebar">
                    <div class="donate-sidebar-header border-bottom-20 padding-left-0 padding-right-0">
                        <h6>Tips</h6>
                    </div>
                    <div class="donate-sidebar-body padding-top-20">
                        <div class="populer">
                            <img src="{{URL::asset('/images/' . $galadana->gambar)}}" alt="{{$galadana->judul}}">
                        </div>
                        <div class="sidebar-donate-header">
                            <h3><strong>Rp. {{$galadana->progres_capaian}} </strong></h3>
                            <p>terkumpul dari Rp. {{$galadana->target_capaian}}</p>
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $galadana->progres_capaian / $galadana->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $galadana->progres_capaian / $galadana->target_capaian * 100 }}%;"></div>
                            </div>
                            <p class="padding-top-10">terkumpul dari <strong>267</strong> orang selama 4 bulan</p>
                        </div>
                    </div>
                </div>
                <h6 class="padding-bottom-20">Tentang Pengelola</h6>
                <div class="donate-sidebar">
                    <div class="donate-sidebar-header border-bottom-20 padding-left-0 padding-right-0">
                        <img src="{{ asset('assets') }}/images/avatars/5.jpg" alt="">
                        <i class="far fa-envelope padding-left-2"></i>
                        <p style="font-size:12px;font-weight:500">{{$author->name}}</p>
                    </div>
                    <div class="donate-sidebar-body padding-top-20">
                        <div class="sidebar-donate-header"> 
                            <small>orang ini akan menerima sumbangan anda secara langsung. 
                                Semua pembayaran bersifat final dan tidak dapat dikembalikan.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection