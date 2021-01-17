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
                    <button type="button" aria-haspopup="true" aria-expanded="false" class="btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buat Kategori
                    </button>
                </div>    </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Control Types</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="postimage">
                                    <img src="{{URL::asset('/images/' . $galadana->gambar)}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <strong>Judul: </strong><br>
                                    {{$galadana->judul}}
                                </div>
                                <div class="form-group">
                                    <strong>Penggalangan dana untuk: </strong><br>
                                    {{$galadana->users->name}}
                                </div>
                                <div class="form-group">
                                    <strong>Kode Pos/Alamat: </strong><br>
                                    55183 - Brajan, Tamantirto, Kasihan, Bantul, Yogyakarta bla bla bla bla bla bla bla bla bla bla bla bla bla
                                </div>
                                <div class="form-group">
                                    <strong>Target pencapaian donasi: </strong><br>
                                    Rp. {{$galadana->target_capaian}}
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <strong>Oleh: </strong><br>
                                    {{$galadana->users->name}}
                                </div>
                                <div class="form-group">
                                    <strong>Cerita/Penjelasan: </strong><br>
                                    <text>
                                    {!! html_entity_decode($galadana->cerita) !!}
                                    </text>
                                </div>
                            </div>
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
    </div>
@endsection
@push('js')
<script>
     $(document).ready( function () {
      $('#tableDonate').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('manajemen-post.show', $galadana->slug) }}",
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