<style>
    .menu-malasngoding{
		background-color: #3141ff;
	}

	.menu-malasngoding ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
	}

	.menu-malasngoding > ul > li {
		float: left;
	}

	
	.menu-malasngoding li a {
		display: inline-block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	.menu-malasngoding li a:hover{
		background-color: #2525ff;
	}

	li.dropdown {
		display: inline-block;
	}

	.dropdown:hover .isi-dropdown {
		display: block;
	}

	.isi-dropdown a:hover {
		color: #fff !important;
	}

	.isi-dropdown {
		position: absolute;
		display: none;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
		background-color: #f9f9f9;
	}

	.isi-dropdown a {
		color: #3c3c3c !important;
	}

	.isi-dropdown a:hover {
		color: #232323 !important;
		background: #f3f3f3 !important;
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
        <div class="menu-malasngoding">
            <li class="dropdown">
            <ul class="isi-dropdown">
                <li class="{{ Request::is('post-ditolak', 'persetujuan-post') ? 'mm-active' : '' }}">
                    <a href="#">
                        Persetujuan Post
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ Request::is('post-ditolak', 'persetujuan-post') ? 'mm-show' : '' }}">
                    <li>
                            <a href="/persetujuan-post" class="{{ Request::is('persetujuan-post') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Persetujuan
                            </a>
                        </li>
                        <li>
                            <a href="/post-ditolak" class="{{ Request::is('post-ditolak') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Post Ditolak
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
</li>
        </div>
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