@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<style>
    html,body{
        background: #f2f2fe;
    }
</style>
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12">
                <div class="edit-item">
                    <div class="kelola">
                        <a href="/kelola">
                            <h5><i class="fa fa-fw" aria-hidden="true"></i>Kelola Galadana</h5>
                        </a>
                    </div>
                    
                </div>
            </div>
            <div class="offset-lg-1 col-lg-10 col-md-12 col-sm-12">
                <div class="create-item">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                            <h5>Hapus Penggalangan Dana</h5>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <p style="color: #999;">You will no longer have access to this fundraiser after deleting.<br>
                            If you received donations, your donors will still be able to view a summary.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 right-all">
                            <a href="#" style="color: #d92550;text-decoration: underline!important;">
                                <strong>Hapus Galadana</strong>
                            </a>
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
                        <h5 class="modal-title weight-900" id="seeallModalLabel">Ubah Gambar</h5>
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