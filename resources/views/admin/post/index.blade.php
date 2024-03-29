@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Manajemen Postingan Penggalangan Dana</title>
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
                    <div>Manajemen Postingan Penggalangan Dana
                        <div class="page-title-subheading">Halaman ini berisi tentang semua yang berhubungan dengan postingan penggalangan dana, baik yang sedang berjalan, yang sudah selesei maupun penggalangan dana yang ditolak.
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
                </div> -->    </div>
        </div>
        @include('alerts.success')
        @include('alerts.errors')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                    <li class="nav-item">
                        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-status-1">
                            <span>Galadana yang Berjalan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-status-2">
                            <span>Galadana yang sudah selesai</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-status-0">
                            <span>Galadana ditolak</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-status-1" role="tabpanel">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Galadana yang Berjalan</h5>
                                    <table id="tableIndex" class="mb-0 table table-hover">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Cerita</th>
                                            <th>Oleh</th>
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
                    <div class="tab-pane tabs-animation fade" id="tab-content-status-2" role="tabpanel">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Galadana yang sudah selesai</h5>
                                    <table id="tableIndex2" class="mb-0 table table-hover" style="min-width:923px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Cerita</th>
                                            <th>Oleh</th>
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
                    <div class="tab-pane tabs-animation fade" id="tab-content-status-0" role="tabpanel">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Galadana ditolak</h5>
                                    <table id="tableIndex3" class="mb-0 table table-hover" style="min-width:923px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Cerita</th>
                                            <th>Oleh</th>
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
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
     $(document).ready( function () {
      $('#tableIndex').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('manajemen-post') }}",
            type: 'GET',
        },
        columns: [
           {data: 'rownum', name: 'rownum', orderable: true, searchable: false},
           { data: 'judul', name: 'judul' },
           { data: 'cerita', name: 'cerita', searchable: false },
           { data: 'name', name: 'name', searchable: false },
           { data: 'status', name: 'status', orderable: false, searchable: false },
           { data: 'created_at', name: 'created_at', searchable: false },
           { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[ 5, "desc" ]],
        columnDefs: [
            { "width": "2%", "targets": 0 },
            { "width": "20%", "targets": 1 },
            { "width": "25%", "targets": 2 },
            { "width": "12%", "targets": 3 },
            { "width": "8%", "targets": 4 },
            { "width": "15%", "targets": 5 },
            { "width": "20%", "targets": 6 }
        ]
       });
       $('#tableIndex2').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('post-status-2') }}",
            type: 'GET',
        },
        columns: [
           {data: 'rownum', name: 'rownum', orderable: true, searchable: false},
           { data: 'judul', name: 'judul' },
           { data: 'cerita', name: 'cerita' },
           { data: 'name', name: 'name' },
           { data: 'status', name: 'status', orderable: false, searchable: false },
           { data: 'created_at', name: 'created_at' },
           { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[ 5, "desc" ]],
        columnDefs: [
            { "width": "2%", "targets": 0 },
            { "width": "20%", "targets": 1 },
            { "width": "25%", "targets": 2 },
            { "width": "12%", "targets": 3 },
            { "width": "8%", "targets": 4 },
            { "width": "15%", "targets": 5 },
            { "width": "20%", "targets": 6 }
        ]
       });

       $('#tableIndex3').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('post-ditolak') }}",
            type: 'GET',
        },
        columns: [
           {data: 'rownum', name: 'rownum', orderable: true, searchable: false},
           { data: 'judul', name: 'judul' },
           { data: 'cerita', name: 'cerita' },
           { data: 'name', name: 'name' },
           { data: 'status', name: 'status', orderable: false, searchable: false },
           { data: 'created_at', name: 'created_at' },
           { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[ 5, "desc" ]],
        columnDefs: [
            { "width": "2%", "targets": 0 },
            { "width": "20%", "targets": 1 },
            { "width": "25%", "targets": 2 },
            { "width": "12%", "targets": 3 },
            { "width": "8%", "targets": 4 },
            { "width": "15%", "targets": 5 },
            { "width": "20%", "targets": 6 }
        ]
       });
     });

   </script>
@endpush
