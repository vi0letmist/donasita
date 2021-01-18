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
                                    <img src="{{URL::asset('/images/' . $kategori->gambar)}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <strong>Nama: </strong><br>
                                    {{$kategori->nama}}
                                </div>
                                <div class="form-group">
                                    <strong>Slug: </strong><br>
                                    {{$kategori->slug}}
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
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
           { data: 'cerita', name: 'cerita' },
           { data: 'name', name: 'name' },
           { data: 'status', name: 'status', orderable: false, searchable: false },
           { data: 'created_at', name: 'created_at' },
           { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[ 5, "desc" ]],
        columnDefs: [
            { "width": "20%", "targets": 1 },
            { "width": "25%", "targets": 2 },
            { "width": "8%", "targets": 3 },
            { "width": "5%", "targets": 4 },
            { "width": "13%", "targets": 5 },
            { "width": "17%", "targets": 6 }
        ]
       });
     });

     $('body').on('click', '.deleteTodo', function () {
 
        var todo_id = $(this).data("id");
        if(confirm("Are You sure want to delete !"))
        {
          $.ajax({
              type: "get",
              url: "{{ url('delete-todo') }}"+'/'+todo_id,
              success: function (data) {
              var oTable = $('#laravel-datatable-crud').dataTable(); 
              oTable.fnDraw(false);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
       }
    });   
  
   </script>
@endpush