@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Buat Kategori</title>
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
                    <div>Buat Kategori
                        <div class="page-title-subheading">Halaman ini ditujukan untuk membuat kategori.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <!-- <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button> -->
                    <a href="/manajemen-kategori/create" type="button" class="btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buat Kategori
</a>
                </div>    </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Control Types</h5>
                        <form id="createForm" method="POST" action="{{ route('manajemen-kategori.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }} position-relative">
                                <label class="form-control-label" for="gambar">{{ __('Gambar *  ') }}</label>
                                <fieldset>
                                    <input oninput="this.className = ''" name="gambar" id="gambar" type="file" class="form-control-file{{ $errors->has('gambar') ? ' is-invalid' : '' }}" value="{{old('gambar')}}" required="">
                                </fieldset>
                                @include('alerts.feedback', ['field' => 'gambar'])
                            </div>
                            <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }} position-relative">
                                <label class="form-control-label" for="input-nama">{{ __('Nama *  ') }}</label>
                                <fieldset>
                                    <input oninput="this.className = ''" name="nama" value="{{ old('nama') }}" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" id="nama" placeholder="{{ __('nama kategori') }}" required="">
                                </fieldset>
                                @include('alerts.feedback', ['field' => 'nama'])
                            </div>
                            
                            <!-- <div class="position-relative form-group">
                                <label for="examplePassword" class="">Password</label>
                                <div class="file-upload">
                                    <input style="padding-top: 10px;" type="file" class="form-control btn btn-sm" name="gambar" value="{{old('gambar')}}" onchange="readURL(this);" accept="image/*">
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <button class="mt-1 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection