@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20">
            <div class="center-heading">
                <h1><strong>{{$galadana->judul}}</strong></h1>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12" id="item-post">
            <div class="item-post">
                <div class="post-pict-item">
                    <img src="{{ asset('assets') }}/images/eduard.jpg" class="rounded img-fluid d-block mx-auto" alt="">
                </div>
                <div class="admin-item-post">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <img src="assets/images/avatars/5.jpg" alt="">
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-12 admin-item">
                            <p>Jaffar Jatmiko Jati adalah yang mengelola penggalangan dana ini</p>
                        </div>
                    </div>
                    <div class="date-item">
                        <p>Dibuat pada 13 oktober 2019</p>
                    </div>
                    <div class="desc-item">
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                        officia deserunt mollit anim id est laborum.<br>
                        Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, 
                        est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod 
                        gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut 
                        ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. 
                        Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, 
                        aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl 
                        adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. 
                        Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, 
                        mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center padding-bottom-40 padding-top-20">
                            <a href="#" class="donate-button">Donasi Sekarang</a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center padding-bottom-40 padding-top-20">
                            <a href="#" class="share-button">Bagikan</a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 border-bottom-20">
                            <h5>Pengelola</h5>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-12 padding-bottom-40 padding-top-20">
                            <img src="{{ asset('assets') }}/images/avatars/5.jpg" alt="">
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6  padding-bottom-40 padding-top-20 admin-item">    
                            <p>Jaffar Jatmiko Jati<br>Pengelola</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6  padding-bottom-40 padding-top-20 admin-item right-text">    
                            <a href="#" class="contact-button">Kontak</a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 border-bottom-20">
                            <h5>Komentar</h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20 border-bottom-20">
                            <div class="row">
                                <div class="col-lg-2 col-md-4 col-sm-4">
                                    <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                        <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-8 col-sm-8">
                                    <p>Luhut Pandjaitan donasi <b>Rp. 10.000</b></p>
                                    <p>Semoga bermanfaat ya :)</p>
                                    <br>
                                    <p class="lastdonate">1 jam yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20 border-bottom-20">
                            <div class="row">
                                <div class="col-lg-2 col-md-4 col-sm-4">
                                    <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                        <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-8 col-sm-8">
                                    <p>Luhut Pandjaitan donasi <b>Rp. 10.000</b></p>
                                    <p>Semoga bermanfaat ya :)</p>
                                    <br>
                                    <p class="lastdonate">1 jam yang lalu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20">
                            <i class="far fa-flag"></i>&nbsp<a href="#" class="report">Laporkan Penggalangan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-item">
            <div class="sidebar-donate-item" id="sidebar">
                <div class="sidebar-donate-header">
                    <h3><strong>Rp. 80.000.000 </strong></h3>
                    <p>terkumpul dari Rp. 400.000.000</p>
                    <div class="progress-bar-xs progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                    <p><strong>20%</strong> tercapai</p>
                </div>
                <div class="sidebar-donate-body">
                    <a href="#" class="donate-button">Donasi Sekarang</a>
                </div>
                <div class="sidebar-donate-footer padding-bottom-10">
                    <a href="#" class="share-button">Bagikan</a>
                </div>
                <!-- people donation -->
                <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                            <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8">
                            <p>Luhut Pandjaitan</p>
                            <div class="row padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <ul>
                                        <li>
                                            <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                        </li>
                                        <li>
                                            <span class="lastdonate dot">14 jam yang lalu</span>
                                        </li>
                                    </ul>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end people donation-->
                <!-- people donation -->
                <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                            <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8">
                            <p>Luhut Pandjaitan</p>
                            <div class="row padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <ul>
                                        <li>
                                            <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                        </li>
                                        <li>
                                            <span class="lastdonate dot">14 jam yang lalu</span>
                                        </li>
                                    </ul>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end people donation-->
                <!-- people donation -->
                <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                            <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8">
                            <p>Luhut Pandjaitan</p>
                            <div class="row padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <ul>
                                        <li>
                                            <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                        </li>
                                        <li>
                                            <span class="lastdonate dot">14 jam yang lalu</span>
                                        </li>
                                    </ul>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end people donation-->
                <div class="col-lg-12 col-md-12 col-sm-12 center-all padding-top-20 padding-left-5 padding-right-5">
                    <button type="button" class="btn seeall-button" data-toggle="modal" data-target="#seeallModal">
                        Lihat Semua
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="seeallModal" tabindex="-1" role="dialog" aria-labelledby="seeallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">    
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h5 class="modal-title weight-900" id="seeallModalLabel">Donasi</h5>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 padding-left-2 padding-right-2">
                        <a href="#" class="donate-button">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="scroll-area-lg">
                <div class="modal-body scrollbar-container ps--active-y">
                    <!-- people donation -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                <p>Luhut Pandjaitan</p>
                                <div class="row padding-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                            </li>
                                            <li>
                                                <span class="lastdonate dot">14 jam yang lalu</span>
                                            </li>
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end people donation-->
                    <!-- people donation -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                <p>Luhut Pandjaitan</p>
                                <div class="row padding-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                            </li>
                                            <li>
                                                <span class="lastdonate dot">14 jam yang lalu</span>
                                            </li>
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end people donation--> 
                    <!-- people donation -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                <p>Luhut Pandjaitan</p>
                                <div class="row padding-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                            </li>
                                            <li>
                                                <span class="lastdonate dot">14 jam yang lalu</span>
                                            </li>
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end people donation--> 
                    <!-- people donation -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                <p>Luhut Pandjaitan</p>
                                <div class="row padding-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                            </li>
                                            <li>
                                                <span class="lastdonate dot">14 jam yang lalu</span>
                                            </li>
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end people donation--> 
                    <!-- people donation -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                <p>Luhut Pandjaitan</p>
                                <div class="row padding-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                            </li>
                                            <li>
                                                <span class="lastdonate dot">14 jam yang lalu</span>
                                            </li>
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end people donation--> 
                    <!-- people donation -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                <p>Luhut Pandjaitan</p>
                                <div class="row padding-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                            </li>
                                            <li>
                                                <span class="lastdonate dot">14 jam yang lalu</span>
                                            </li>
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end people donation--> 
                    <!-- people donation -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                <p>Luhut Pandjaitan</p>
                                <div class="row padding-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                            </li>
                                            <li>
                                                <span class="lastdonate dot">14 jam yang lalu</span>
                                            </li>
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end people donation--> 
                    <!-- people donation -->
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                <p>Luhut Pandjaitan</p>
                                <div class="row padding-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <span class="weight-900">Rp. 10.000.000<!-- -->&nbsp;</span>
                                            </li>
                                            <li>
                                                <span class="lastdonate dot">14 jam yang lalu</span>
                                            </li>
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end people donation--> 
                </div>
            </div>
            <!-- <div class="modal-footer">
               
            </div> -->
        </div>
    </div>
</div>
<script>
$(document).ready(function () { 
    var top = $('#sidebar').offset().top - parseFloat($('#sidebar').css('marginTop').replace(/auto/, 0));
    $(window).scroll(function (event) {
        var y = $(this).scrollTop();
        //if y > top, it means that if we scroll down any more, parts of our element will be outside the viewport
        //so we move the element down so that it remains in view.
        if (y >= top) {
           var difference = y - top;
           $('#sidebar').css("top",difference);
       }
   });
});</script>
@endsection