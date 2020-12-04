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
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">Collapse</h5>
                                            <div class="collapse" id="collapseExample123"><p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                                nesciunt sapiente ea
                                                proident.</p>
                                                <p>Donec molestie odio id nisi malesuada, mattis tincidunt velit egestas. Sed non pulvinar risus. Aenean elementum eleifend nunc, pellentesque dapibus arcu hendrerit fringilla. Aliquam in nibh massa. Cras ultricies
                                                    lorem non enim volutpat, a eleifend urna placerat. Fusce id luctus urna. In sed leo tellus. Mauris tristique leo a nisl feugiat, eget vehicula leo venenatis. Quisque magna metus, luctus quis sollicitudin vel,
                                                    vehicula nec ipsum. Donec rutrum commodo lacus ut condimentum. Integer vel turpis purus. Etiam vehicula, nulla non fringilla blandit, massa purus faucibus tellus, a luctus enim orci non augue. Aenean
                                                    ullamcorper nisl urna, non feugiat tortor volutpat in. Vivamus lobortis massa dolor, eget faucibus ipsum varius eget. Pellentesque imperdiet, turpis sed sagittis lobortis, leo elit laoreet arcu, vehicula
                                                    sagittis elit leo id nisi.</p></div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" data-toggle="collapse" href="#collapseExample123" class="btn btn-primary">Toggle</button>
                                        </div>
                                    </div>
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Simple</h5>
                                            <div id="exampleAccordion" data-children=".item">
                                                <div class="item">
                                                    <button type="button" aria-expanded="true" aria-controls="exampleAccordion1" data-toggle="collapse" href="#collapseExample" class="m-0 p-0 btn btn-link">Toggle item</button>
                                                    <div data-parent="#exampleAccordion" id="collapseExample" class="collapse show"><p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium lorem non vestibulum scelerisque. Proin a
                                                        vestibulum sem, eget tristique massa. Aliquam lacinia rhoncus nibh quis ornare.</p></div>
                                                </div>
                                                <div class="item">
                                                    <button type="button" aria-expanded="false" aria-controls="exampleAccordion2" data-toggle="collapse" href="#collapseExample2" class="m-0 p-0 btn btn-link">Toggle item 2</button>
                                                    <div data-parent="#exampleAccordion" id="collapseExample2" class="collapse"><p class="mb-3">Donec at ipsum dignissim, rutrum turpis scelerisque, tristique lectus. Pellentesque habitant morbi tristique
                                                        senectus
                                                        et netus et malesuada fames ac turpis egestas. Vivamus nec dui turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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