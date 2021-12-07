@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Manajemen User</title>
@endsection
@section('manajemen-post','active')
<style>
    .foto_profil img{
        max-width: 300px !important;
        clip-path: circle();
        border-radius: 50%;
    }
</style>
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Manajemen User
                        <div class="page-title-subheading">Halaman ini berisikan tabel user yaitu user dengan role admin dan role donatur.
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
                        <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-1">
                            <span>User Admin</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-2">
                            <span>User Donatur</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Tabel Admin</h5>
                                    <table id="tableIndex" class="mb-0 table table-hover">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>role</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
                        <div class="col-lg-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Tabel Donatur</h5>
                                    <table id="tableIndex2" class="mb-0 table table-hover" style="min-width:923px;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>role</th>
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
            url: "{{ url('manajemen-user') }}",
            type: 'GET',
        },
        columns: [
           {data: 'rownum', name: 'rownum', orderable: true, searchable: false},
           { data: 'name', name: 'name' },
           { data: 'email', name: 'email' },
           { data: 'role', name: 'role' },
           { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[ 4, "desc" ]],
        columnDefs: [
            { "width": "25%", "targets": 1 },
            { "width": "30%", "targets": 2 },
            { "width": "25%", "targets": 3 },
            { "width": "20%", "targets": 4 }
        ]
       });
       $('#tableIndex2').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('user-pengguna') }}",
            type: 'GET',
        },
        columns: [
           {data: 'rownum', name: 'rownum', orderable: true, searchable: false},
           { data: 'name', name: 'name' },
           { data: 'email', name: 'email' },
           { data: 'role', name: 'role' },
           { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[ 4, "desc" ]],
        columnDefs: [
            { "width": "25%", "targets": 1 },
            { "width": "30%", "targets": 2 },
            { "width": "25%", "targets": 3 },
            { "width": "20%", "targets": 4 }
        ]
       });
     });

   </script>
@endpush
@foreach($userAll as $u)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h5 class="modal-title">Detail User</h5>
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
                            <div class="foto_profil">
                                <img src="{{URL::asset('/assets/images/avatars/' . $u->foto_profil)}}" alt="foto_profil">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <strong>Nama User: </strong><br>
                                {{$u->name}}
                            </div>
                            <div class="form-group">
                                <strong>Email: </strong><br>
                                {{$u->email}}
                            </div>
                            <div class="form-group">
                                <strong>Nomer Handphone: </strong><br>
                                {{$u->no_hp}}
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
@endforeach
