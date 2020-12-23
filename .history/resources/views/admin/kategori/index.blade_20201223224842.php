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
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Table with hover</h5>
                        <table id="myTable" class="mb-0 table table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $no=1;
                                @endphp
                                @foreach($kategori as $k)
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$k->nama}}</td>
                                    <td>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-success"><i class="pe-7s-note btn-icon-wrapper"> </i></button>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info"><i class="pe-7s-info btn-icon-wrapper"> </i></button>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

