@extends('layouts.dashboard', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>Edit Penggalangan Dana</title>
@endsection
@section('content')
<style>
    .cerita img{
  max-width: 100% !important;
  height: auto !important;
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
                    <div>Lihat Penggalangan Dana
                        <div class="page-title-subheading">Halaman ini berisikan mengenai detail penggalangan dana beserta histori donasi.
                        </div>
                    </div>
                </div>
                <!-- <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <button type="button" aria-haspopup="true" aria-expanded="false" class="btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buat Kategori
                    </button>
                </div> -->
            </div>
        </div>
        @include('alerts.success')
        @include('alerts.errors')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 cerita">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Detail Penggalangan Dana</h5>
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
                                    <strong>Oleh: </strong><br>
                                    {{$galadana->users->name}}
                                </div>
                                <div class="form-group">
                                    <strong>Target pencapaian donasi: </strong><br>
                                    @currency($galadana->target_capaian)
                                </div>
                                <div class="form-group">
                                    <strong>Dibuat pada: </strong><br>
                                    {{ \Carbon\Carbon::parse($galadana->created_at)->locale('id')->isoFormat('LLL') }}
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <div class="form-group">
                                    <strong>Cerita/Penjelasan: </strong><br>
                                    <text>
                                    {!! html_entity_decode($galadana->cerita) !!}
                                    </text>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Histori donasi</h5>
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
