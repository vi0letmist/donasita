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
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/templatemo-softy-pinko.css">
    

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
    <header class="header-area2 header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/home" class="logo">
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
    <footer>
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
    </footer>
    
    <!-- jQuery -->
    <script src="{{ asset('assets') }}/js/jquery-3.5.1.js"></script>
    <script src="{{ asset('assets') }}/js/app.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets') }}/js/popper.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets') }}/js/scrollreveal.min.js"></script>
    <script src="{{ asset('assets') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('assets') }}/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="{{ asset('assets') }}/js/custom.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/scripts/main.js"></script>

    <script src="{{ asset('ckeditor') }}/ckeditor.js"></script>
    @include('sweetalert::alert')
    <script type="text/javascript" src="{{ asset('assets') }}/js/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">
          $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
              $('.deleteGaladana').on('click', function(e){
                  e.preventDefault();
                  var delete_id = $(this).closest("tr").find('.delete_galadana_id').val();
                  swal({
                      title: "Anda yakin?",
                      text: "Anda tidak akan bisa mengembalikannya lagi",
                      icon: "warning",
                      buttons: true,
                      daggerMode:true,
                      buttons: true,
                      confirmButtonText: "Yes",
                      cancelButtonText: "No",
                      closeModal: false,
                      closeModal: false
                  })
                  .then((willDelete) => {
                      if(willDelete){
                          var data = {
                            "_token": $('input[name=_token]').val(),
                            "id_lomba": delete_id,
                            "_method": "DELETE"
                        };
                        $.ajax({
                            type: "POST",
                            url: "/galadana/"+delete_id+"/delete",
                            data: data,
                            success: function(){
                                swal("Terhapus", "Lomba berhasil terhapus", "success").then(function(){ location.reload();});
                            }
                        });
                      }else{
                        swal("Batal dihapus!", "Data aman di database.", "error");
                      }
                  });
              });
              });
          </script>
  </body>
</html>