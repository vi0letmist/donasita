@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-8 col-md-12 col-sm-12">
                <div class="edit-item">
                    <form method="POST" action="{{ route('galadana.update', $galadana->id) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="edit-item-header">
                            <strong><h5>Ubah Penggalangan Dana</h5></strong>
                            <p>{{ ($galadana->judul) }}</p>  
                        </div>
                        <div class="edit-item-body">
                            <div class="edit-body-header">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ringkasan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Foto</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Cerita</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="edit-body-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <p>Judul:</p>
                                                <fieldset>
                                                    <input name="judul" type="text" class="form-control" id="judul" placeholder="{{ $galadana->judul }}" value="{{ old('judul') }}">
                                                </fieldset>
                                                @include('alerts.feedback', ['field' => 'judul'])
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <p>Target:</p>
                                                <fieldset>
                                                    <input name="target" type="text" class="form-control" id="target" placeholder="{{ $galadana->target_capaian }}" value="{{ old('target_capaian') }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <p>Tautan penggalangan dana:</p>
                                                <fieldset>
                                                    <input name="slug" type="text" class="form-control" id="slug" placeholder="galangdana/{{ $galadana->slug }}" value="{{ old('slug') }}">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Lanjutkan</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="file-upload">
                                            <input style="padding-top: 10px;" type="file" class="form-control btn btn-sm" name="gambar" value="{{old('gambar')}}" onchange="readURL(this);" accept="image/*">
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <fieldset>
                                            <textarea name="cerita" value="{{ old('cerita') }}" rows="6" class="cerita" id="cerita" placeholder="{{ $galadana->cerita}}"></textarea>
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'cerita'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div class="create-item">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection