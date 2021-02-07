@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/share.js') }}"></script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20">
            <div class="center-heading">
                <h1><strong>{{$galadana->judul}}</strong></h1>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12" id="item-post">
            <div class="item-post">
                <div class="post-pict-item">
                    <img src="{{URL::asset('/images/' . $galadana->gambar)}}" class="rounded img-fluid d-block mx-auto" alt="">
                </div>
                <div class="admin-item-post">
                    <div class="row border-bottom-10">
                        <div class="col-lg-2 col-md-2 col-sm-12 post-ava-item" style="margin-bottom:10px;">
                            <img src="{{ asset('assets') }}/images/avatars/5.jpg" alt="">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 admin-item">
                            <p>{{$galadana->users->name}} adalah yang mengelola penggalangan dana ini</p>
                        </div>
                    </div>
                    
                    <div class="desc-item">
                        {!!html_entity_decode ($galadana->cerita) !!}
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center padding-bottom-40 padding-top-20">
                            <a href="/g/{{$galadana->slug}}/donasi" class="donate-button">Donasi Sekarang</a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center padding-bottom-40 padding-top-20">
                            <a href="#" class="share-button">Bagikan</a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 border-bottom-20">
                            <h5>Pengelola</h5>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-12 post-ava-item padding-bottom-40 padding-top-20">
                            <img src="{{ asset('assets') }}/images/avatars/5.jpg" alt="">
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6  padding-bottom-40 padding-top-20 admin-item">    
                            <p>{{$galadana->users->name}}<br>Pengelola</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6  padding-bottom-40 padding-top-20 admin-item right-text">    
                            <a href="#" class="contact-button">Kontak</a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5>Komentar</h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="panel-body">
                            {{ csrf_field() }}
                                <div id="post_data"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10">
                            <div class="date-item">
                                <p>Dibuat pada {{ \Carbon\Carbon::parse($galadana->created_at)->locale('id')->isoFormat('LLL') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 padding-top-20">
                            <i class="far fa-flag"></i>&nbsp<a href="#" class="report">Laporkan Penggalangan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-item">
            <div class="sidebar-donate-item" id="sidebar">
                <div class="sidebar-donate-header">
                    <h3><strong>@currency($galadana->progres_capaian) </strong></h3>
                    <p>terkumpul dari @currency($galadana->target_capaian)</p>
                    <div class="progress-bar-xs progress">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $galadana->progres_capaian / $galadana->target_capaian * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$galadana->progres_capaian / $galadana->target_capaian * 100}}%"></div>
                    </div>
                    <p><strong>{!! number_format((float)$galadana->progres_capaian / $galadana->target_capaian * 100, 1, '.', '') !!}%</strong> tercapai</p>
                </div>
                <div class="sidebar-donate-body">
                    <a href="/g/{{$galadana->slug}}/donasi" class="donate-button">Donasi Sekarang</a>
                </div>
                <div class="sidebar-donate-footer padding-bottom-10">
                    <button type="button" class="btn share-button" data-toggle="modal" data-target="#bagikanModal">
                        Bagikan
                    </button>
                </div>
                
                <!-- people donation -->
                @if(!$sideDonate->isEmpty())
                @foreach($sideDonate as $a)
                <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                            <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8">
                            @if($a->anonim == TRUE)
                            <p>Anonim</p>
                            @else
                            <p>{{$a->nama}}</p>
                            @endif
                            <div class="row padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <ul>
                                        <li>
                                            <span class="weight-900">@currency($a->nominal)<!-- -->&nbsp;</span>
                                        </li>
                                        <li>
                                            <span class="lastdonate dot">{{\Carbon\Carbon::createFromTimeStamp(strtotime($a->created_at))->locale('id')->diffForHumans()}}</span>
                                        </li>
                                    </ul>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                            <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 col-sm-8">
                            <p>Jadilah pendukung pertama</p>
                            <p style="color:#777777;">Donasi anda penting</p>
                        </div>
                    </div>
                </div>
                @endif
                <!-- end people donation-->
                <div class="col-lg-12 col-md-12 col-sm-12 center-all padding-top-20 padding-left-5 padding-right-5">
                    <button type="button" class="btn seeall-button" data-toggle="modal" data-target="#seeallModal">
                        Lihat Semua
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal seeall-->
<div class="modal fade" id="seeallModal" tabindex="-1" role="dialog" aria-labelledby="seeallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">    
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h5 class="modal-title weight-900" id="seeallModalLabel">Donasi</h5>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 padding-left-2 padding-right-2">
                        <a href="/g/{{$galadana->slug}}/donasi" class="donate-button">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="scroll-area-lg">
                <div class="modal-body scrollbar-container ps--active-y">
                    <!-- people donation -->
                    @if(!$donate->isEmpty())
                    @foreach($donate as $a)
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                @if($a->anonim == TRUE)
                                <p>Anonim</p>
                                @else
                                <p>{{$a->nama}}</p>
                                @endif
                                <div class="row padding-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <span class="weight-900">@currency($a->nominal)<!-- -->&nbsp;</span>
                                            </li>
                                            <li>
                                                <span class="lastdonate dot">14 jam yang lalu</span>
                                            </li>
                                        </ul>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10 border-bottom-10">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 padding-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 loyalty-item">
                                    <i class="far fa-user-circle icon-gradient bg-grow-early"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-8">
                                <p>Jadilah pendukung pertama</p>
                                <p style="color:#777777;">Donasi anda penting</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end people donation-->
                </div>
            </div>
            <!-- <div class="modal-footer">
               
            </div> -->
        </div>
    </div>
</div>
<!-- Modal bagikan-->
<div class="modal fade" id="bagikanModal" tabindex="-1" role="dialog" aria-labelledby="bagikanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">    
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 padding-top-10">
                    <h3 class="modal-title weight-900" id="bagikanModalLabel">Membantu dengan cara bagikan</h3>
                    </div>
                </div>
            </div>
            <div class="scroll-area-lg">
                <div class="modal-body scrollbar-container ps--active-y">
                    {!!html_entity_decode ($share)!!}
                    <div id="social-links">
                        <ul>
                            <li>
                                <a href="{{$facebook}}" class="social-button " id="" title="">
                                    <div class="fb-svg-container">
                                        <img src="{{ asset('assets') }}/svg/facebook.svg" alt="facebook">
                                    </div>
                                    <div>
                                    Facebook
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-button " id="" title="">
                                    <div class="twitter-svg-container">
                                        <img src="{{ asset('assets') }}/svg/twitter.svg" alt="twitter">
                                    </div>
                                    <div>
                                    Twitter
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-button " id="" title="">
                                    <div class="reddit-svg-container">
                                        <img src="{{ asset('assets') }}/svg/reddit.svg" alt="reddit">
                                    </div>
                                    <div>
                                    Reddit
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-button " id="" title="">
                                    <div class="telegram-svg-container">
                                        <img src="{{ asset('assets') }}/svg/telegram.svg" alt="telegram">
                                    </div>
                                    <div>
                                    Telegram
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
               
            </div> -->
        </div>
    </div>
</div>
<script>
$(document).ready(function () { 
    var top = $('#sidebar').offset().top - parseFloat($('#sidebar').css('marginTop').replace(/auto/, 0));
    $(window).scroll(function (event) {
        var y = $(this).scrollTop();
        //if y > top, it means that if we scroll down any more, parts of our element will be outside the viewport
        //so we move the element down so that it remains in view.
        if (y >= top) {
           var difference = y - top;
           $('#sidebar').css("top",difference);
       }
   });
});</script>

@endsection
@push('js')
<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_more('', _token);

 function load_more(id="", _token)
 {

  $.ajax({
   url:"{{ route('galadana.load_komen', $galadana->id) }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#LoadMoreButton').remove();
    $('#post_data').append(data);
   }
  })
 }
 $('body').on('click', '#LoadMoreButton', function(){
    var id= $(this).data('id');

    $('#LoadMoreButton').html("loading...");
    load_more(id, _token);
 });

});
</script>
@endpush