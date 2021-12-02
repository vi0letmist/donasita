@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Manajemen Donasi</title>
@endsection
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
                    <div>Manajemen Donasi
                        <div class="page-title-subheading">Halaman ini berisikan mengenai donasi-donasi yang sudah terjadi pada sistem ini.
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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                    <li class="nav-item">
                        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-2">
                            <span>Donasi yang berhasil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-3">
                            <span>Donasi yang Batal</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-2" role="tabpanel">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Donasi yang berhasil</h5>
                                    <table id="tableDonate" class="mb-0 table table-hover">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nominal</th>
                                            <th>Komen</th>
                                            <th>Status</th>
                                            <th>Dibuat pada</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tabs-animation fade" id="tab-content-3" role="tabpanel">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Donasi yang Batal</h5>
                                    <table id="tableDonate3" class="mb-0 table table-hover" style="min-width:923px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nominal</th>
                                            <th>Komen</th>
                                            <th>Status</th>
                                            <th>Dibuat pada</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
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
            url: "{{ route('manajemen-donasi') }}",
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
       $('#tableDonate3').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('manajemen-donasi-3') }}",
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
@endpush
@foreach($donate as $d)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
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
                        @if($d->status == 1)
                        <div class="col-lg-12 col-md-12 col-sm-12 center-all">
                            <a href="/konfirmasi-donasi/approve/{{$d->id}}" class="mb-2 mr-2 btn btn-success">Setuju</a>
                            <a href="/konfirmasi-donasi/decline/{{$d->id}}" class="mb-2 mr-2 btn btn-danger">Tolak</a>
                        </div>
                        @else
                        <div>

                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
            </div> -->
        </div>
    </div>
</div>
@endforeach
