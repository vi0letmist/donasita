@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
    <style>
        .populer{
            width: 100%;
            height: 200px;
        }
    </style>
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
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-business-time fa-w-20"></i>
                            </span>
                            Buttons
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                            Inbox
                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                            Book
                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                            Picture
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                            File Disabled
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    </div>
        </div>
        <div class="row">
            <!-- ***** Features Small Item Start ***** -->
            @foreach($galadana as $g)
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                <div class="features-populer-item">
                    <div class="populer" style="background-image: url(../images/{{$g->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">
                            
                    </div>
                    <h5 class="features-title"><b>{{$g->judul}}</b></h5>
                    <p>{!! html_entity_decode(\Illuminate\Support\Str::limit($g->cerita, $limit = 80, $end = '...')) !!}</p>
                    <p class="lastdonate">oleh {{$g->users->name}}</p>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-success btn-blc"><i class="pe-7s-check btn-icon-wrapper"> </i></button>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-info btn-blc" data-toggle="modal" data-target="#exampleModal-{{ $g->id }}">
                        <i class="pe-7s-info btn-icon-wrapper"> </i>
                    </button>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger btn-blc"><i class="pe-7s-close btn-icon-wrapper"> </i></button>
                    
                </div>
            </div>
            <!-- ***** Features Small Item End ***** -->
            @endforeach
            
        </div>
    </div>


@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $na->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">    
                <div class="row">
                    <div class="col-lg-2 offset-lg-10 col-md-2 offset-md-10 col-sm-2 offset-sm-10">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="scroll-area-lg">
                <div class="modal-body scrollbar-container ps--active-y">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 no-padding">
                            <div class="postimage">
                                <img src="assets/images/eduard.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <strong>Judul: </strong><br>
                                Penggalangan dana ponpes tebu ireng
                            </div>
                            <div class="form-group">
                                <strong>Penggalangan dana untuk: </strong><br>
                                Pondok Pesantren Tebu Ireng
                            </div>
                            <div class="form-group">
                                <strong>Kode Pos/Alamat: </strong><br>
                                55183 - Brajan, Tamantirto, Kasihan, Bantul, Yogyakarta bla bla bla bla bla bla bla bla bla bla bla bla bla
                            </div>
                            <div class="form-group">
                                <strong>Target pencapaian donasi: </strong><br>
                                Rp. 10.000.000
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <strong>Oleh: </strong><br>
                                Jaffar Jatmiko Jati
                            </div>
                            <div class="form-group">
                                <strong>Cerita/Penjelasan: </strong><br>
                                <text>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </text>
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
