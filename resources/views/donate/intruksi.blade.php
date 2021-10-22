@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Intruksi Pembayaran Penggalangan Dana: {{$galadana->judul}}</title>
@endsection
@section('content')
<style>
    html,body{
        background: #f2f2fe;
    }
    .foto_profil img{
        max-width: 60px;
        clip-path: circle();
        border-radius: 50%;
    }
</style>
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-7 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="create-item">
                    <h4>Intruksi Pembayaran</h4>
                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20 padding-left-1 padding-right-1">
                        <div class="intruksi-form">
                            <p class="text-center">Transfer sesuai nominal dibawah ini:</p>
                            <h3>@currency($donasi->nominal)</h3>
                            <!-- <div class="col-lg-12 intruksi-alert">
                                <i class="fas fa-exclamation-circle padding-right-10"></i>
                                <p><b>PENTING!</b> Mohon transfer tepat sampai 3 angka terakhir agar donasi terverifikan otomatis</p>
                            </div> -->
                            <div class="col-lg-12 col-md-12 col-sm-12 intruksi-uniq bg-disabled">
                                <div class="col-lg-12 border-bottom-10">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <p>Jumlah donasi</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right">
                                            <p>@currency($donasi->nominal)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 padding-bottom-10">
                                    <div class="row">
                                        <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                                            <p>Kode unik(*)</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right">
                                            <p>189</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <small>* 3 angka terakhir akan didonasikan</small> -->
                            <p class="text-center padding-top-10">Pembayaran dilakukan ke rekening bersama a/n<br>Yayasan Penggalangan Dana</p>
                            <div class="col-lg-12 col-md-12 col-sm-12 intruksi-rek bg-disabled">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 bank-logo">
                                        <img src="{{ asset('assets') }}/images/logo/mandiri_logo.png" alt="mandiri">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6" id="pilih">
                                        <p class="text-center" value="1121092122112">1121092122112</p>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 salin">
                                        <button type="button" style="border: 1px solid #dee2e6;" onclick="copy_text()">Salin</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 intruksi-rek-2">
                                <p>Transfer sebelum <b>{{ \Carbon\Carbon::parse($donasi->batas_date)->locale('id')->isoFormat('LLL') }}</b> atau donasi kamu otomatis dibatalkan oleh sistem</p>
                            </div>
                            <div class="padding-bottom-10">
                                <a href="/donasi/bukti-pembayaran/{{$donasi->id}}" class="donate-button">Upload Bukti Pembayaran</a>
                            </div>
                            <button type="button" class="btn share-button" data-toggle="modal" data-target="#bagikanModal">
                                Bagikan
                            </button>
                        </div>
                    </div>
                    <!-- ***** Contact Form End ***** -->
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="donate-sidebar">
                    <div class="donate-sidebar-header border-bottom-20 padding-left-0 padding-right-0">
                        <h6>{{$galadana->judul}}</h6>
                    </div>
                    <div class="donate-sidebar-body padding-top-20">
                        <div class="populer">
                            <img src="{{URL::asset('/images/' . $galadana->gambar)}}" alt="{{$galadana->judul}}">
                        </div>
                        <div class="sidebar-donate-header">
                            <h3><strong>@currency($galadana->progres_capaian) </strong></h3>
                            <p>terkumpul dari @currency($galadana->target_capaian)</p>
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $galadana->progres_capaian / $galadana->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $galadana->progres_capaian / $galadana->target_capaian * 100 }}%;"></div>
                            </div>
                            <p class="padding-top-10">terkumpul dari <strong>{{$sumDonasi}}</strong> orang selama {{\Carbon\Carbon::createFromTimeStamp(strtotime($galadana->created_at))->locale('id')->longAbsoluteDiffForHumans()}}</p>
                        </div>
                    </div>
                </div>
                <h6 class="padding-bottom-20">Tentang Pengelola</h6>
                <div class="donate-sidebar">
                    <div class="donate-sidebar-header foto_profil border-bottom-20 padding-left-0 padding-right-0">
                        <img src="{{ asset('assets') }}/images/avatars/{{$author->foto_profil}}" alt="Foto Profil" class="img-fluid">
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
<!-- Modal bagikan-->
<div class="modal fade" id="bagikanModal" tabindex="-1" role="dialog" aria-labelledby="bagikanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">

                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10">
                    <h3 class="modal-title weight-900" id="bagikanModalLabel">Membantu dengan cara bagikan</h3>
                    </div>
                </div>
            </div>
            <div class="scroll-area-lg">
                <div class="modal-body scrollbar-container ps--active-y">
                    <div id="social-links">
                        <ul>
                            <li>
                                <a href="{{$facebook}}" class="social-button " id="" title="">
                                    <div class="fb-svg-container">
                                        <img src="{{ asset('assets') }}/svg/facebook.svg" alt="facebook">
                                    </div>
                                    <div>
                                    Facebook
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{$twitter}}" class="social-button " id="" title="">
                                    <div class="twitter-svg-container">
                                        <img src="{{ asset('assets') }}/svg/twitter.svg" alt="twitter">
                                    </div>
                                    <div>
                                    Twitter
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{$reddit}}" class="social-button " id="" title="">
                                    <div class="reddit-svg-container">
                                        <img src="{{ asset('assets') }}/svg/reddit.svg" alt="reddit">
                                    </div>
                                    <div>
                                    Reddit
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{$telegram}}" class="social-button " id="" title="">
                                    <div class="telegram-svg-container">
                                        <img src="{{ asset('assets') }}/svg/telegram.svg" alt="telegram">
                                    </div>
                                    <div>
                                    Telegram
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{$whatsapp}}" class="social-button " id="" title="">
                                    <div class="whatsapp-svg-container">
                                        <img src="{{ asset('assets') }}/svg/whatsapp.svg" alt="whatsapp">
                                    </div>
                                    <div>
                                    Whatsapp
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 border-top-20">
                        <h5>Salin Tautan</h5>
                        <div class="row padding-top-10">
                            <div class="col-lg-9 col-md-9 col-sm-9 inputSalin">
                                <input type="text" value="g/{{$galadana->slug}}" id="pilih" readonly />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <button type="button" class="main-button" onclick="copy_text()">Salin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">

            </div> -->
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    function copy_text() {
        document.getElementById("pilih").select();
        document.execCommand("salin");
        alert("Text berhasil disalin");
    }
</script>
@endpush
