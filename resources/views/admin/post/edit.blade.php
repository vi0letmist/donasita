@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Edit Penggalangan Dana</title>
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
                    <div>Edit Penggalangan Dana
                        <div class="page-title-subheading">Halaman ini berisikan detail penggalangan dana untuk diedit.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <!-- <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button> -->
                    <button type="button" aria-haspopup="true" aria-expanded="false" class="btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buat Kategori
                    </button>
                </div>    </div>
        </div>
        @include('alerts.success')
        @include('alerts.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Edit Penggalangan Dana</h5>
                        <form id="createForm" method="POST" action="{{ route('manajemen-post.update', $galadana->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="gambar">{{ __('Gambar *  ') }}</label>
                                        <fieldset>
                                            <input name="gambar" id="gambar" type="file" class="form-control-file" value="{{ old('file', $galadana->gambar) }}">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'gambar'])
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group{{ $errors->has('judul') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="input-judul">{{ __('Judul *  ') }}</label>
                                        <fieldset>
                                            <input name="judul" value="{{ old('name', $galadana->judul) }}" type="text" class="form-control" id="judul">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'judul'])
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="input-judul">{{ __('Slug *  ') }}</label>
                                        <fieldset>
                                            <input name="slug" value="{{ old('name', $galadana->slug) }}" type="text" class="form-control" id="slug">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'slug'])
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group{{ $errors->has('target_capaian') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="input-target-capaian">{{ __('Target Capaian *  ') }}</label>
                                        <fieldset>
                                            <input name="target_capaian" value="{{ old('name', $galadana->target_capaian) }}" type="text" class="form-control" id="target_capaian">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'target_capaian'])
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group{{ $errors->has('progres_capaian') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="input-progres-capaian">{{ __('Progres Capaian *  ') }}</label>
                                        <fieldset>
                                            <input name="progres_capaian" value="{{ old('name', $galadana->progres_capaian) }}" type="text" class="form-control" id="progres_capaian">
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'progres_capaian'])
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group{{ $errors->has('cerita') ? ' has-danger' : '' }} position-relative">
                                        <label class="form-control-label" for="input-cerita">{{ __('Cerita *  ') }}</label>
                                        <fieldset>
                                            <textarea name="cerita" value="{{ old('cerita') }}" rows="6" class="cerita" id="cerita">
                                                {{ old('name',$galadana->cerita) }}
                                            </textarea>
                                        </fieldset>
                                        @include('alerts.feedback', ['field' => 'cerita'])
                                    </div>
                                </div>
                            </div>
                            <button class="mt-1 btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
