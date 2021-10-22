@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Bukti Pembayaran Penggalangan Dana: {{$galadana->judul}}</title>
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
                    <h4>Bukti Pembayaran</h4>
                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20 padding-left-1 padding-right-1">
                        <div class="intruksi-form">
                            <p class="text-center">Upload Bukti Pembayaran:</p>
                            <form id="buktiForm" method="POST" action="{{ route('donasi.storeBukti') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="file-upload">
                                    <input style="padding-top: 10px;" type="file" class="form-control btn btn-sm" name="gambar" value="{{old('gambar')}}" onchange="readURL(this);" accept="image/*">
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                        </div>
                                    </div>
                                </div>
                                <div style="overflow:auto;">
                                    <button type="submit" id="form-submit" class="main-button">Kirim Bukti Pembayaran</button>
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
