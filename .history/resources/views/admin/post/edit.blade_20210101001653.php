@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Analytics Dashboard
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <button type="button" aria-haspopup="true" aria-expanded="false" class="btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buat Kategori
                    </button>
                </div>    </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Control Types</h5>
                        <form id="createForm" method="POST" action="{{ route('manajemen-post.update', $galadana->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }} position-relative">
                                <label class="form-control-label" for="gambar">{{ __('Gambar *  ') }}</label>
                                <fieldset>
                                    <input name="gambar" id="gambar" type="file" class="form-control-file" value="{{ old('file', $galadana->gambar) }}">
                                </fieldset>
                                @include('alerts.feedback', ['field' => 'gambar'])
                            </div>
                            
                            <div class="form-group{{ $errors->has('judul') ? ' has-danger' : '' }} position-relative">
                                <label class="form-control-label" for="input-judul">{{ __('Judul *  ') }}</label>
                                <fieldset>
                                    <input name="judul" value="{{ old('name', $galadana->judul) }}" type="text" class="form-control" id="judul">
                                </fieldset>
                                @include('alerts.feedback', ['field' => 'judul'])
                            </div>
                            <div class="form-group{{ $errors->has('target_capaian') ? ' has-danger' : '' }} position-relative">
                                <label class="form-control-label" for="input-target-capaian">{{ __('Target Capaian *  ') }}</label>
                                <fieldset>
                                    <input name="target_capaian" value="{{ old('name', $galadana->target_capaian) }}" type="text" class="form-control" id="target_capaian">
                                </fieldset>
                                @include('alerts.feedback', ['field' => 'judul'])
                            </div>
                            <div class="form-group{{ $errors->has('cerita') ? ' has-danger' : '' }} position-relative">
                                <label class="form-control-label" for="input-cerita">{{ __('Cerita *  ') }}</label>
                                <fieldset>
                                    <textarea name="cerita" value="{{ old('cerita') }}" rows="6" class="cerita" id="cerita">
                                        {{ old('name',$galadana->cerita) }}
                                    </textarea>
                                </fieldset>
                                @include('alerts.feedback', ['field' => 'cerita'])
                            </div>
                            <button class="mt-1 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection