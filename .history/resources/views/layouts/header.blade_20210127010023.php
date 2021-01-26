<style>
    .dropdown button{
        font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: 500;
        font-size: 13px;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        height: 40px;
        border: transparent;
        letter-spacing: 1px;
        border-radius: 20px;
        
    }
    .dropdown button:hover{
        background-color: #e0f2f1;
    }
</style>
<nav class="main-nav nav-page">
@if(Auth::check())
    <ul class="nav nav-page-left">
        <li>
            <div class="search-wrapper search">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
        </li>
        <li>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Galadana Untuk
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Medis & Kesehatan</a></li>
                    <li><a href="#">Pendidikan</a></li>
                    <li><a href="#">Bencana & Keadaan Darurat</a></li>
                    <li class="divider"></li>
                    <li><a href="/galadana">Lihat Semua</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <!-- ***** Logo Start ***** -->
    <div class="nav-page-center">
    <a href="/home" class="logo">
        <img src="{{ asset('assets') }}/images/logo1.png" alt="Softy Pinko" style="width:10em;"/>
    </a>
    </div>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav nav-page-right">
        <li>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{Auth::user()->name}}
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Kelola Akun</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">Keluar</a></li>
                    <li><a href="#">Bencana & Keadaan Darurat</a></li>
                    <li class="divider"></li>
                    <li><a href="/galadana">Lihat Semua</a></li>
                </ul>
            </div>
        </li>
        <li style="padding-top:10px;"><div class="a-rule a-rule--vertical"></div></li>
        <li><a href="/kelola/galadana">Kelola Galadana</a></li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
    <a class='menu-trigger'>
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
@else
    <ul class="nav nav-page-left">
        <li>
            <div class="search-wrapper search">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
        </li>
        <li>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Galadana Untuk
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Medis & Kesehatan</a></li>
                    <li><a href="#">Pendidikan</a></li>
                    <li><a href="#">Bencana & Keadaan Darurat</a></li>
                    <li class="divider"></li>
                    <li><a href="/galadana">Lihat Semua</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <!-- ***** Logo Start ***** -->
    <div class="nav-page-center">
    <a href="/home" class="logo">
        <img src="{{ asset('assets') }}/images/logo1.png" alt="Softy Pinko" style="width:10em;"/>
    </a>
    </div>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav nav-page-right">
        <li><a href="/login">Masuk</a></li>
        <li><a href="/galadana/create" class="main-login">Mulai Galadana</a></li>
        <!-- <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> -->
    <a class='menu-trigger'>
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
@endif
</nav>
@push('js')
<script type="text/javascript" src="{{ asset('assets') }}/scripts/main.js"></script>
@endpush