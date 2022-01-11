@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Persetujuan Penggalanggan Dana</title>
@endsection
@section('content')
    <style>
        .populer{
            width: 100%;
            height: 200px;
        }
        .cerita img{
            max-width: 100% !important;
            height: auto !important;
        }
        .modal-content{
            padding-bottom: 10px !important;
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
                    <div>Persetujuan Penggalanggan Dana
                        <div class="page-title-subheading">Halaman ini berisi semua postingan yang menunggu untuk disetujui maupun ditolak.
                        </div>
                    </div>
                </div>
                <!-- <div class="page-title-actions">
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
                </div>  -->   </div>
        </div>
        @include('alerts.success')
        @include('alerts.errors')
        <div class="row">
            <!-- ***** Features Small Item Start ***** -->
            @if($galadana->isEmpty())
                <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                    <img src="{{ asset('assets') }}/images/inbox-empty-icon.png" width="200px">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                    <h2 style="color:#dee2e6">Tidak ada data</h2>
                </div>
            @else
                @foreach($galadana as $g)

                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">

                    <div class="features-populer-item">
                    <input type="hidden" class="declineGaladanaId" value="{{$g->id}}">
                        <div class="populer" style="background-image: url(../images/{{$g->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">

                        </div>
                        <h5 class="features-title"><b>{{$g->judul}}</b></h5>
                        <div class="desc-ngitem">
                            {!! html_entity_decode(\Illuminate\Support\Str::limit($g->cerita, $limit = 80, $end = '...')) !!}
                        </div>
                        <p class="lastdonate">oleh {{$g->users->name}}</p>
                        <a href="/persetujuan-post/approve/{{$g->id}}">
                            <button class="mr-2 btn-icon btn-icon-only btn btn-success btn-blc"><i class="pe-7s-check btn-icon-wrapper"> </i></button>
                        </a>
                        <button class="mr-2 btn-icon btn-icon-only btn btn-info btn-blc" data-toggle="modal" data-target="#exampleModal{{$g->id}}">
                            <i class="pe-7s-info btn-icon-wrapper"> </i>
                        </button>
                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger btn-blc declineGaladana"><i class="pe-7s-close btn-icon-wrapper"> </i></button>

                    </div>
                </div>
                <!-- ***** Features Small Item End ***** -->
                @endforeach
            @endif
        </div>
    </div>

@endsection
@push('js')
<script type="text/javascript">
          $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //   startdecline galadana
              $('body').on('click','.declineGaladana', function(e){
                  e.preventDefault();
                  var delete_id = $(this).closest('.features-populer-item').find('.declineGaladanaId').val();
                  swal({
                      title: "Anda yakin menolak penggalangan dana ini?",
                      text: "Anda tidak akan bisa mengembalikannya lagi",
                      icon: "warning",
                      buttons: true,
                      daggerMode:true,
                      buttons: true,
                      confirmButtonText: "Yes",
                      cancelButtonText: "No",
                      closeModal: false,
                      closeModal: false
                  })
                  .then((willDelete) => {
                      if(willDelete){
                          var data = {
                            "_token": $('input[name=_token]').val(),
                            "id_lomba": delete_id,
                            "_method": "GET"
                        };
                        $.ajax({
                            type: "POST",
                            url: "/persetujuan-post/decline/"+delete_id,
                            data: data,
                            success: function(){
                                swal("Tertolak", "Penggalangan dana tersebut sudah berhasil ditolak", "success").then(function(){ location.reload();});
                            }
                        });
                      }else{
                        swal("Batal ditolak!", "Data aman di database.", "error");
                      }
                  });
              });
            //   enddelete
            //   startdecline galadana
            $('body').on('click','.declineGaladanaMod', function(e){
                  e.preventDefault();
                  var delete_id = $(this).closest('.modalKonfirmasi').find('.declineGaladanaId').val();
                  swal({
                      title: "Anda yakin menolak penggalangan dana ini?",
                      text: "Anda tidak akan bisa mengembalikannya lagi",
                      icon: "warning",
                      buttons: true,
                      daggerMode:true,
                      buttons: true,
                      confirmButtonText: "Yes",
                      cancelButtonText: "No",
                      closeModal: false,
                      closeModal: false
                  })
                  .then((willDelete) => {
                      if(willDelete){
                          var data = {
                            "_token": $('input[name=_token]').val(),
                            "id_lomba": delete_id,
                            "_method": "GET"
                        };
                        $.ajax({
                            type: "POST",
                            url: "/persetujuan-post/decline/"+delete_id,
                            data: data,
                            success: function(){
                                swal("Tertolak", "Penggalangan dana tersebut sudah berhasil ditolak", "success").then(function(){ location.reload();});
                            }
                        });
                      }else{
                        swal("Batal ditolak!", "Data aman di database.", "error");
                      }
                  });
              });
            //   enddelete
              });
</script>
@endpush
@foreach($galadana as $g)
<!-- Modal -->
<div class="modal fade modalKonfirmasi" id="exampleModal{{$g->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <input type="hidden" class="declineGaladanaId" value="{{$g->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h5 class="modal-title">Detail penggalangan dana</h5>
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
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 no-padding">
                            <div class="postimage">
                                <img src="{{URL::asset('/images/' . $g->gambar)}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <strong>Judul: </strong><br>
                                {{$g->judul}}
                            </div>
                            <div class="form-group">
                                <strong>Oleh: </strong><br>
                                {{$g->users->name}}
                            </div>
                            <div class="form-group">
                                <strong>Target pencapaian donasi: </strong><br>
                                @currency($g->target_capaian)
                            </div>
                            <div class="form-group">
                                <strong>Dibuat pada: </strong><br>
                                {{ \Carbon\Carbon::parse($g->created_at)->locale('id')->isoFormat('LLL') }}
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <div class="form-group cerita">
                                <strong>Cerita/Penjelasan: </strong><br>
                                <text>
                                {!! html_entity_decode($g->cerita) !!}
                                </text>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 center-all">

                        </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="mb-2 mr-2 btn btn-danger declineGaladanaMod">Tolak</button>
                <a href="/persetujuan-post/approve/{{$g->id}}" class="mb-2 mr-2 btn btn-success">Setuju</a>
            </div>
        </div>
    </div>
</div>
@endforeach
