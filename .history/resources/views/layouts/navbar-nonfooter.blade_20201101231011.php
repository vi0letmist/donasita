<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
        <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
        </script>
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
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/templatemo-softy-pinko.css">
    <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet"> 

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
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="assets/images/logo1.png" alt="Softy Pinko" style="width:10em;"/>
                        </a>
                        <div class="search-wrapper search">
                            <div class="input-holder">
                                <input type="text" class="search-input" placeholder="Type to search">
                                <button class="search-icon"><span></span></button>
                            </div>
                            <button class="close"></button>
                        </div>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <!-- <li><a href="#welcome" class="active">Beranda</a></li>
                            <li><a href="#features">Penggalangan Dana</a></li>
                            <li><a href="/login" class="main-login">Masuk</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li> -->
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
    <!-- <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Copyright &copy; 2020 Softy Pinko Company - Design: TemplateMo</p>
                </div>
            </div>
        </div>
    </footer> -->
    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="assets/js/app.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/scripts/main.js"></script>

    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script src="summernote/summernote.js"></script>
    <script type="text/javascript" src="{{ asset('summernote') }}/summernote.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function(){

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 600
            });
            });

            $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
            },
            duration: 600
            });
        });

        $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
        });

        $(".submit").click(function(){
        return false;
        });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#taek').summernote();
        });
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
    </script>
    @stack('js')
    @stack('script')
  </body>
</html>