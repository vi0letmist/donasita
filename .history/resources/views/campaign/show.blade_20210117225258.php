@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<style>
    html,body{
        background: #f2f2fe;
    }
    .left-all a{
        color:#1e1e1e;
        font-weight: bold;
        font-size: 14px;
        margin-top: 6px;
    }
    .left-all a:hover{
        color: #3ac47d;
    }
    .dot::before{
        content: "\2022";
        color: #adadad;
        font-weight: 900;
        display: inline-block; 
        width: 1.1em;
        margin-left: 12px;
    }
    .progress{
        width:50%;
        margin-top: 6px;
    }
    #tableDonate_wrapper input{
        height: 30px;
    }
    .edit-body-header{
        padding: 0 10px 10px 0;
    }
</style>
<div class="container padding-top-60">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="edit-item">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 sidebarKelola">
                        <ul class="vertical-nav-menu">
                        <input type="hidden" class="deleteGaladanaId" value="$galadana->id">
                            <li class="app-sidebar__heading">Pengaturan & Pengelolaan</li>
                            <li>
                                <a href="/kelola/galadana" class="{{ Request::is('kelola/umum') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-config"></i>
                                    Umum
                                </a>
                            </li>
                            <li>
                                <a href="/kelola/galadana" class="{{ Request::is('kelola*') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-albums"></i>
                                    Galadana Anda
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 sideRight">
                        <form id="kelolaUpdate" method="POST" action="{{ route('kelola.update', $galadana->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="edit-item-header">
                                <h5>{{ ($galadana->judul) }}</h5>
                                <div class="left-all">
                                    <a href="/kelola/{{$galadana->slug}}/ubah">
                                        <i class="fas fa-pencil-alt"></i> Ubah
                                    </a>
                                    <a href="/g/{{$galadana->slug}}" class="dot">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </div>
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $galadana->progres_capaian / $galadana->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$galadana->progres_capaian / $galadana->target_capaian * 100}}%"></div>
                                </div>
                                <p><strong>@currency($galadana->progres_capaian)</strong> tercapai</p>
                            </div>
                            <div class="edit-item-body">
                                <div class="edit-body-header">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="donasi-tab" data-toggle="tab" href="#donasi" role="tab" aria-controls="donasi" aria-selected="true">Donasi</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="edit-body-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="donasi" role="tabpanel" aria-labelledby="donasi-tab">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <table id="tableDonate" class="mb-0 table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Nominal</th>
                                                            <th>Komen</th>
                                                            <th>Created at</th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
            url: "{{ route('galadana.show', $galadana->slug) }}",
            type: 'GET',
        },
        columns: [
           {data: 'rownum', name: 'rownum', orderable: true, searchable: false},
           { data: 'nama', name: 'nama' },
           { data: 'nominal', name: 'nominal' },
           { data: 'komen', name: 'komen' },
           { data: 'created_at', name: 'created_at' },
        ],
        order: [[ 4, "desc" ]],
        columnDefs: [
            { "width": "30%", "targets": 1 },
            { "width": "20%", "targets": 2 },
            { "width": "30%", "targets": 3 },
            { "width": "20%", "targets": 4 },
        ]
       });
     });  
   </script>
@endpush