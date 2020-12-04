@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-10 col-md-12 col-sm-12">
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
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('judul') ? ' has-danger' : '' }}">
                                                <p>Judul:</p>
                                                <fieldset>
                                                    <input name="judul" type="text" class="form-control" id="judul" value="{{ old('name', $galadana->judul) }}">
                                                </fieldset>
                                                @include('alerts.feedback', ['field' => 'judul'])
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('target_capaian') ? ' has-danger' : '' }}">
                                                <p>Target:</p>
                                                <fieldset>
                                                    <input name="target_capaian" type="text" class="form-control" id="target_capaian" value="{{ old('name',$galadana->target_capaian) }}">
                                                </fieldset>
                                                @include('alerts.feedback', ['field' => 'target_capaian'])
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                                <p>Tautan penggalangan dana:</p>
                                                <p style="color:#999;font-weight:400;"><strong>galadana/{{$galadana->slug }}</strong></p>
                                                <fieldset>
                                                    <input name="slug" type="text" class="form-control" id="slug" value="{{ old('name',$galadana->slug) }}">
                                                </fieldset>
                                                @include('alerts.feedback', ['field' => 'slug'])
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Simpan</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="post-pict-item">
                                            <img src="{{URL::asset('/images/' . $galadana->gambar)}}" class="rounded img-fluid d-block mx-auto" alt="">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 right-all">
                                                <button type="button" class="btn edit-button" data-toggle="modal" data-target="#editModal">
                                                    edit
                                                </button>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 left-all">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Simpan</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <fieldset>
                                            <textarea name="cerita" value="{{ old('cerita') }}" rows="6" class="cerita" id="cerita">
                                                {{ old('name',$galadana->cerita) }}
                                            </textarea>
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'cerita'])
                                        <div class="col-lg-12 col-md-12 col-sm-12 center-all" style="margin: 20px 10px 20px 10px;">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="main-button">Simpan</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="offset-lg-1 col-lg-10 col-md-12 col-sm-12">
                <div class="create-item">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px;">
                            <h5>Hapus Penggalangan Dana</h5>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <p style="color: #999;">You will no longer have access to this fundraiser after deleting.<br>
                            If you received donations, your donors will still be able to view a summary.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 right-all">
                            <a href="#" style="color: #d92550;text-decoration: underline;">Hapus Galadana</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">    
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h5 class="modal-title weight-900" id="seeallModalLabel">Donasi</h5>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="scroll-area-lg">
                <div class="modal-body scrollbar-container ps--active-y">
                    <div class="file-upload">
                        <input style="padding-top: 10px;" type="file" class="form-control btn btn-sm" name="gambar" value="{{old('name', $galadana->gambar)}}" onchange="readURL(this);" accept="image/*">
                        <div class="file-upload-content">
                            <img class="file-upload-image" src="{{URL::asset('/images/' . $galadana->gambar)}}" alt="your image" />
                            <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">{{old('name', $galadana->gambar)}}</span></button>
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