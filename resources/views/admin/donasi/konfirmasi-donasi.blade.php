@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Konfirmasi Donasi</title>
@endsection
<style>
    .modal-content{
        padding-bottom: 10px !important;
    }
</style>
@section('manajemen-post','active')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Konfirmasi Donasi
                        <div class="page-title-subheading">Halaman ini berisikan mengenai donasi yang membutuhkan konfirmasi.
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
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Donasi</h5>
                        <table id="tableDonate" class="mb-0 table table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nominal</th>
                                <th>Komen</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
     $(document).ready( function () {
      $('#tableDonate').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('konfirmasi-donasi') }}",
            type: 'GET',
        },
        columns: [
           {data: 'rownum', name: 'rownum', orderable: true, searchable: false},
           { data: 'nama', name: 'nama' },
           { data: 'nominal', name: 'nominal', searchable: false },
           { data: 'komen', name: 'komen', searchable: false },
           { data: 'status', name: 'status', searchable: false },
           { data: 'created_at', name: 'created_at', searchable: false },
           { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[ 4, "desc" ]],
        columnDefs: [
            { "width": "10%", "targets": 1 },
            { "width": "30%", "targets": 2 },
            { "width": "20%", "targets": 3 },
            { "width": "10%", "targets": 4 },
            { "width": "30%", "targets": 5 },
        ]
       });
     });
   </script>
   <script type="text/javascript">
          $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //   startdecline galadana
              $('body').on('click','.declineDonasi', function(e){
                  e.preventDefault();
                  var delete_id = $(this).closest('.modalKonfirmasi').find('.declineDonasiId').val();
                  swal({
                      title: "Anda yakin menolak donasi ini?",
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
                            url: "/konfirmasi-donasi/decline/"+delete_id,
                            data: data,
                            success: function(){
                                swal("Tertolak", "Donasi tersebut sudah berhasil ditolak", "success").then(function(){ location.reload();});
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
@foreach($donasi as $d)
<!-- Modal -->
<div class="modal fade modalKonfirmasi" id="exampleModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
<input type="hidden" class="declineDonasiId" value="{{$d->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h5 class="modal-title">Detail Donasi</h5>
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
                                <img src="{{URL::asset('/images/' . $d->bukti_pembayaran)}}" alt="bukti_pembayaran">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <strong>Nama Donatur: </strong><br>
                                {{$d->nama}}
                            </div>
                            <div class="form-group">
                                <strong>Email: </strong><br>
                                {{$d->email}}
                            </div>
                            <div class="form-group">
                                <strong>Nominal Donasi: </strong><br>
                                @currency($d->nominal)
                            </div>
                            <div class="form-group">
                                <strong>Dibuat pada: </strong><br>
                                {{ \Carbon\Carbon::parse($d->created_at)->locale('id')->isoFormat('LLL') }}
                            </div>
                            @if($d->komen != NULL)
                            <div class="form-group">
                                <strong>Komen: </strong><br>
                                {{$d->komen}}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <strong>Judul Penggalangan Dana: </strong><br>
                                {{$d->judul}}
                            </div>
                            <div class="form-group">
                                <strong>Pengelola Penggalangan dana: </strong><br>
                                {{$d->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="mb-2 mr-2 btn btn-danger declineDonasi">Tolak</button>
                <a href="/konfirmasi-donasi/approve/{{$d->id}}" class="mb-2 mr-2 btn btn-success">Setuju</a>
            </div>
        </div>
    </div>
</div>
@endforeach
