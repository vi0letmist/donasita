@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('content')
<style>
    html,body{
        background: #f2f2fe;
    }
</style>
<div class="container padding-top-60">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12">
                <div class="edit-item">
                    <div class="kelola">
                        <a href="/kelola">
                            <h5><i class="fa fa-fw" aria-hidden="true"></i>Kelola Galadana</h5>
                        </a>
                    </div>
                    <!-- ***** Features Small Item Start ***** -->
                @foreach($galadana as $g)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" onclick="location.href='/g/{{$g->slug}}';" style="cursor: pointer;">
                    <div class="features-populer-item">
                        <div class="populer" style="background-image: url(../images/{{$g->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">
                            
                        </div>
                        <h5 class="features-title"><b>{{$g->judul}}</b></h5>
                        <p>{!! html_entity_decode(\Illuminate\Support\Str::limit($g->cerita, $limit = 80, $end = '...')) !!}</p>
                        <p class="lastdonate">donasi terakhir {{\Carbon\Carbon::createFromTimeStamp(strtotime($g->created_at))->locale('id')->diffForHumans()}}</p>
                        <div class="bar">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $g->progres_capaian / $g->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$g->progres_capaian / $g->target_capaian * 100}}%"></div>
                            </div>
                        </div>
                        <div class="donateprog">
                            <p><b>@currency($g->progres_capaian)</b> dari @currency($g->target_capaian)</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- ***** Features Small Item End ***** -->
                </div>
            </div>
            <div class="offset-lg-1 col-lg-10 col-md-12 col-sm-12">
                <div class="create-item">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                            <h5>Hapus Penggalangan Dana</h5>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <p style="color: #999;">You will no longer have access to this fundraiser after deleting.<br>
                            If you received donations, your donors will still be able to view a summary.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 right-all">
                            <a href="#" style="color: #d92550;text-decoration: underline!important;">
                                <strong>Hapus Galadana</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection