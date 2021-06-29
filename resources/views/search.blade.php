@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>search</title>
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/share.js') }}"></script>
@section('content')
    <style>
        .populer{
            width: 100%;
            height: 200px;
        }
        body{
            background: #f2f2fe;
        }
        .section{
            padding-top:40px;
        }
    </style>
@if(!$galadana->isEmpty())
<section class="section padding-bottom-60 colored">
    <div class="container">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 padding-bottom-20">
            <h2>Hasil yang ditemukan</h2>
        </div>
        @foreach($galadana as $post)
                <!-- ***** Features Small Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s" onclick="location.href='/g/{{$post->slug}}';" style="cursor: pointer;">
                <div class="features-populer-item">
                    <div class="populer" style="background-image: url(./images/{{$post->gambar}});background-size:cover;background-repeat: no-repeat;background-position: center;">
                                
                    </div>
                    <h5 class="features-title"><b>{{$post->judul}}</b></h5>
                    <div class="desc-ngitem">
                        {!! html_entity_decode(\Illuminate\Support\Str::limit($post->cerita, $limit = 80, $end = '...')) !!}
                    </div>
                    <p class="lastdonate">donasi terakhir {{\Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->locale('id')->diffForHumans()}}</p>
                    <div class="bar">
                        <div class="progress-bar-xs progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $post->progres_capaian / $post->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$post->progres_capaian / $post->target_capaian * 100}}%"></div>
                        </div>
                    </div>
                    <div class="donateprog">
                        <p><b>@currency($post->progres_capaian)</b> dari @currency($post->target_capaian)</p>
                    </div>
                </div>
            </div>
            <!-- ***** Features Small Item End ***** -->
        @endforeach
        </div>
    </div>
</section>
@endif
@endsection