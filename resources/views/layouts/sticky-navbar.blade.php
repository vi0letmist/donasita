<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
        <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
        </script>
    @yield('title')
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
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- ***** Footer Start ***** -->
                        @include('layouts.header')
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
    <script type="text/javascript" src="{{ asset('assets') }}/scripts/main.js"></script>
    @stack('js')
    @include('sweetalert::alert')
    <script type="text/javascript" src="{{ asset('assets') }}/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/js/datatables.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/js/zeroclipboard/ZeroClipboard.js"></script>
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
