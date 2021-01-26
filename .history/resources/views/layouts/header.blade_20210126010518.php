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
        <li><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
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