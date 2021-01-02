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
                        <form id="createForm" method="POST" action="{{ route('manajemen-kategori.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="position-relative form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                <label for="gambar" class="">File</label>
                                <input name="gambar" id="gambar" type="file" class="form-control-file{{ $errors->has('gambar') ? ' is-invalid' : '' }}" value="{{old('gambar')}}" required="">
                                @include('alerts.feedback', ['field' => 'gambar'])
                            </div>
                            <div class="position-relative form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                <label for="nama" class="">nama</label>
                                <input name="nama" id="nama" placeholder="Nama Kategori" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" value="{{old('nama)}}" required="">
                               
                            </div>
                            <button class="mt-1 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection