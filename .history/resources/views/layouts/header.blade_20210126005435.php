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
        <li><a href="/galadana">Galadana untuk</a></li>
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
        <li><a href="/login">{{Auth::user()->name}}</a></li>
        <li><a href="/kelola/galadana">Kelola Galadana</a></li>
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
            <a href="/galadana">Galadana untuk
            <i class="pe-7s-angle-down caret-left"></i>
            </a>
            
            <ul>
                <li>Pembangunan</li>
                <li>Medis & Kesehatan</li>
                <li>Bencana & Keadaan Darurat</li>
                <li>Pendidikan</li>
            </ul>
        </li>
        <li><div class="btn-group show">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="p-0 btn">
                Galadana untuk
                <i class="fa fa-angle-down ml-2 opacity-8"></i>
            </a>
            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right show" x-placement="bottom-end" style="position: absolute; transform: translate3d(-180px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                <h6 tabindex="-1" class="dropdown-header">Header</h6>
                <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                <div tabindex="-1" class="dropdown-divider"></div>
                <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
            </div>
        </div></li>

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