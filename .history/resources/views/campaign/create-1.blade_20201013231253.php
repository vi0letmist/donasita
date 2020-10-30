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
                                                        <input name="target" type="text" class="form-control" id="target" placeholder="10.000.000" required="" autofocus>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left-4 padding-right-4">
                                        <fieldset>
                                            <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Penggalangan Dana" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left-4 padding-right-4">
                                        <fieldset>
                                            <input name="penerima" type="email" class="form-control" id="penerima" placeholder="Untuk siapa kamu mengumpulkan dana?" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 padding-left-4 padding-right-4">
                                        <fieldset>
                                            <input name="kodepos" type="email" class="form-control" id="kodepos" placeholder="Kode Pos" required="">
                                        </fieldset>
                                    </div>
                                        <div class="file-upload padding-left-3 padding-right-3">
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

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
                                            </div>
                                        </div>
                                    <div class="col-lg-12 center-all padding-top-10">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Lanjutkan</button>
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
                <div class="create-item">
                    <div class="create-sidebar-header border-bottom-20 padding-left-0 padding-right-0">
                        <h6>Tips</h6>
                    </div>
                    <div class="create-sidebar-body padding-top-10">
                        <p>Anda selalu dapat mengubah jumlah nominal penggalangan dana nanti. Jika 
                            anda tidak yakin harus mulai dari mana, sebagian besar penggalangan dana 
                            memiliki sasaran/target Rp. 10.000.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection