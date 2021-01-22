<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>Softy Pinko - Bootstrap 4.0 Theme</title>
<!--
SOFTY PINKO
https://templatemo.com/tm-535-softy-pinko
-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/templatemo-softy-pinko.css">
    <link href="{{ asset('assets') }}/css/datatables.min.css" rel="stylesheet">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav nav-page">
                        <ul class="nav-page-left list-unstyled disp-flex align-middle">
                            <li class="disp-flex align-middle">
                                <div class="search-wrapper search">
                                    <div class="input-holder">
                                        <input type="text" class="search-input" placeholder="Type to search">
                                        <button class="search-icon"><span></span></button>
                                    </div>
                                    <button class="close"></button>
                                </div>
                            </li>
                            <li class="disp-flex"><a href="/galadana">Penggalangan Dana</a></li>
                        </ul>
                        <!-- ***** Logo Start ***** -->
                        <div class="nav-page-center center-all">
                        <a href="/home" class="logo center-all">
                            <img src="{{ asset('assets') }}/images/logo1.png" alt="Softy Pinko" style="width:10em;"/>
                        </a>
                        </div>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav nav-page-right">
                            <li><a href="#welcome" class="active">Beranda</a></li>
                            <li><a href="/galadana">Penggalangan Dana</a></li>
                            <li><a href="/login" class="main-login">Masuk</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    @yield('content')
    
    <!-- ***** Footer Start ***** -->
    @include('layouts.footer')
    
    
    <!-- jQuery -->
    <script src="{{ asset('assets') }}/js/jquery-3.5.1.js"></script>
    <script src="{{ asset('assets') }}/js/app.js"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets') }}/js/popper.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets') }}/js/scrollreveal.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('assets') }}/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="{{ asset('assets') }}/js/custom.js"></script>
    @stack('js')
    @include('sweetalert::alert')
    <script type="text/javascript" src="{{ asset('assets') }}/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/js/datatables.min.js"></script>
    <script src="{{ asset('ckeditor') }}/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'cerita',{
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            
            $('.collapse').collapse('hide');
        });
        $('#myTab a').on('click', function (e) {
                e.preventDefault()
                $(this).tab('show')
            });
    </script>
    

  </body>
</html>