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
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                <div class="features-populer-item">
                    <div class="populer">
                        <img src="assets/images/eduard.jpg" alt="">
                    </div>
                    <h5 class="features-title"><b>Penanganan Coronavirus</b></h5>
                    <p>Customize anything in this template to fit your website needs</p>
                    <p class="lastdonate">oleh jetri potter</p>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-success"><i class="pe-7s-check btn-icon-wrapper"> </i></button>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                        <i class="pe-7s-info btn-icon-wrapper"> </i>
                    </button>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger"><i class="pe-7s-close btn-icon-wrapper"> </i></button>
                </div>
            </div>
            <!-- ***** Features Small Item End ***** -->
            <!-- ***** Features Small Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                <div class="features-populer-item">
                    <div class="populer">
                        <img src="assets/images/eduard.jpg" alt="">
                    </div>
                    <h5 class="features-title"><b>Penanganan Coronavirus</b></h5>
                    <p>Customize anything in this template to fit your website needs</p>
                    <p class="lastdonate">oleh jetri potter</p>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-success"><i class="pe-7s-check btn-icon-wrapper"> </i></button>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                        <i class="pe-7s-info btn-icon-wrapper"> </i>
                    </button>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger"><i class="pe-7s-close btn-icon-wrapper"> </i></button>
                </div>
            </div>
            <!-- ***** Features Small Item End ***** -->
            <!-- ***** Features Small Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                <div class="features-populer-item">
                    <div class="populer">
                        <img src="assets/images/eduard.jpg" alt="">
                    </div>
                    <h5 class="features-title"><b>Penanganan Coronavirus</b></h5>
                    <p>Customize anything in this template to fit your website needs</p>
                    <p class="lastdonate">oleh jetri potter</p>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-success"><i class="pe-7s-check btn-icon-wrapper"> </i></button>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                        <i class="pe-7s-info btn-icon-wrapper"> </i>
                    </button>
                    <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger"><i class="pe-7s-close btn-icon-wrapper"> </i></button>
                </div>
            </div>
            <!-- ***** Features Small Item End ***** -->
            
        </div>
    </div>


@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">    
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h5 class="modal-title weight-900" id="exampleModal">Donasi</h5>
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
                    
                </div>
            </div>
            <!-- <div class="modal-footer">
               
            </div> -->
        </div>
    </div>
</div>
