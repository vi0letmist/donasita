@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-8 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="edit-item padding-left-1 padding-right-1">
                    <div class="edit-item-header">
                        <strong><h5>Ubah Penggalangan Dana</h5></strong>
                        <p>penggalangan dana pembangunan gedung baru di pondok pesantren tebu ireng </p>  
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 card">
                            <div class="card-header card-header-tab-animation">
                                <ul class="nav nav-justified">
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0" class="active nav-link">Tab 1</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link">Tab 2</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-2" class="nav-link">Tab 3</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg115-0" role="tabpanel"><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                                        software like Aldus PageMaker
                                        including versions of Lorem Ipsum.</p></div>
                                    <div class="tab-pane" id="tab-eg115-1" role="tabpanel"><p>Like Aldus PageMaker including versions of Lorem. It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                                        essentially unchanged. </p></div>
                                    <div class="tab-pane" id="tab-eg115-2" role="tabpanel"><p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                                        type specimen book. It has
                                        survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <div class="col-lg-6">
                                            <p>Judul:</p>
                                            <fieldset>
                                                <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Penggalangan Dana" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Target:</p>
                                            <fieldset>
                                                <input name="target" type="text" class="form-control" id="target" placeholder="Target" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Tautan penggalangan dana:</p>
                                            <fieldset>
                                                <input name="link" type="text" class="form-control" id="link" placeholder="galang-dana/pushi" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12 center-all">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="main-button">Lanjutkan</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="file-upload padding-left-3 padding-right-3">
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                            <div class="drag-text">
                                            <h3>Drag and drop a file or select add Image</h3>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                            </div>
                                        </div><br><br>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <button type="button" class="btn seeall-button" type="button" onclick="$('.file-upload-input').trigger( 'click' )">
                                                    Ubah
                                                </button>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Simpan</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">ccccccccccccccccc</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 padding-left-1 padding-right-1">
                <div class="create-item">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection