@extends('layouts.fixed-navbar', [
    'namePage' => 'HOMEPAGE',
    'activePage' => 'home',
])
@section('title')
    <title>Penggalangan Dana {{$kategori->nama}}</title>
@endsection
@section('content')
    <style>
        .welcome-gal-area {
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url(../images/{{$kategori->gambar}});
            background-repeat: no-repeat;
            background-position: 85% 50%;
            background-size: contain;
            height: 100vh;
        }
        .populer{
            width: 100%;
            height: 200px;
        }
    </style>
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-gal-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-xl-6 offset-lg-1 col-lg-8 col-md-12 col-sm-12">
                        <h1><strong>Dapatkan Bantuan Untuk </strong><br><strong>Penggalangan Dana {{$kategori->nama}}</strong></h1>
                        <p>Dengan PeduliSantri, anda bisa mendapatkan bantuan dalam biaya {{$kategori->nama}}</p>
                        <a href="/galadana/create" class="main-button-slider">Mulai Galadana</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->

    <!-- ***** Features Small End ***** -->


    <!-- ***** Discover near Start ***** -->
    <section class="section padding-bottom-60 colored">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 padding-bottom-30">
                    <h6><b>JELAJAHI PENGGALANGAN DANA</b></h6>
                    <h4><b>Penggalangan dana untuk {{$kategori->nama}}</b></h4>
                </div>
                <div class="panel-body" style="width: 100%;">
                {{ csrf_field() }}
                    <div id="post_data"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Discover near End ***** -->

   @endsection
@push('js')
<script>
    $(document).ready(function(){
    var _token = $('input[name="_token"]').val();
    load_more('', _token);
    function load_more(id="", _token)
    {
    $.ajax({
    url:"{{ route('galadana.load_galadana', $kategori->id) }}",
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
