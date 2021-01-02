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
                </div>    </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Table with hover</h5>
                        <table id="myTable" class="mb-0 table table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kode Pos/Alamat</th>
                                <th>Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $no=1;
                                @endphp
                                @foreach($galadana as $g)
                                @if($g->status != NULL && $g->status != 1)
                                <tr>
                                    <input type="hidden" class="deleteGaladanaId" value="{{ $g->id }}">
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$g->judul}}</td>
                                    <td>{!! html_entity_decode(\Illuminate\Support\Str::limit($g->cerita, $limit = 40, $end = '...')) !!}</td>
                                    <td>{{$g->users->name}}</td>
                                    <td>
                                        @if($g->status == 1)
                                        <div class="mb-2 mr-2 badge badge-success">Berjalan</div>
                                        @elseif($g->status == 2)
                                        <div class="mb-2 mr-2 badge badge-primary">Selesai</div>
                                        @else
                                        <div class="mb-2 mr-2 badge badge-danger">Tidak Disetujui</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('manajemen-post.edit', $g->slug)}}">
                                            <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-success"><i class="pe-7s-note btn-icon-wrapper"> </i></button>
                                        </a>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-info"><i class="pe-7s-info btn-icon-wrapper"> </i></button>
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger deleteGaladana"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                        <button type="button" class="mr-2 btn-icon btn-icon-only btn btn-sm btn-outline-danger deleteGaladana"> 
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

