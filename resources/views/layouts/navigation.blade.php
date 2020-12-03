<nav id="header" class="navbar navbar navbar-light bg-white navbar-expand moodle-has-zindex" aria-label="Site navigation">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="collapse navbar-collapse" >
            <ul class="nav navbar-nav ml-auto mr-lg-5">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <div class="action-menu-trigger">
                        <div class="dropdown" >
                            <a href="#" tabindex="0" class="d-inline-block  dropdown-toggle icon-no-margin" id="action-menu-toggle-1" aria-label="User menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" aria-controls="action-menu-1-menu">
                                <span class="userbutton" >
                                    <span class="usertext mr-1">{{ Auth::user()->name }}</span>
                                    <span class="avatars" >
                                        <span class="avatar current mr-lg-4">
                                            <img src="http://kuliah.itk.ac.id/theme/image.php/degrade/core/1606487364/u/f2" class="userpicture defaultuserpic" width="30" height="30" aria-hidden="true">    
                                        </span>
                                    </span>
                                </span>
                                    
                                <b class="caret"></b>
                            </a>
                                <div class="dropdown-menu dropdown-menu-right menu align-tr-br" id="action-menu-1-menu" data-rel="menu-content" aria-labelledby="action-menu-toggle-1" role="menu" data-align="tr-br">
                                    <a href="#" class="dropdown-item menu-action" role="menuitem" data-title="mymoodle,admin" aria-labelledby="actionmenuaction-1">
                                            <i class="icon fa fa-tachometer fa-fw " aria-hidden="true"></i>
                                        <span class="menu-action-text">
                                            Dashboard
                                        </span>
                                    </a>
                                    <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                                    <a href="/profile" class="dropdown-item menu-action" role="menuitem" data-title="profile,moodle" aria-labelledby="actionmenuaction-2">
                                            <i class="icon fa fa-user fa-fw " aria-hidden="true"></i>
                                        <span class="menu-action-text">
                                            Profile
                                        </span>
                                    </a>
                                    <a href="" class="dropdown-item menu-action" role="menuitem" data-title="grades,grades" aria-labelledby="actionmenuaction-3">
                                            <i class="icon fa fa-table fa-fw " aria-hidden="true"></i>
                                        <span class="menu-action-text">
                                            Grades
                                        </span>
                                    </a>
                                    <a href="" class="dropdown-item menu-action" role="menuitem" data-title="messages,message" aria-labelledby="actionmenuaction-4">
                                            <i class="icon fa fa-comment fa-fw " aria-hidden="true"></i>
                                        <span class="menu-action-text">
                                            Messages
                                        </span>
                                    </a>
                                    <a href="" class="dropdown-item menu-action" role="menuitem" data-title="preferences,moodle" aria-labelledby="actionmenuaction-5">
                                            <i class="icon fa fa-wrench fa-fw " aria-hidden="true"></i>
                                        <span class="menu-action-text">
                                            Preferences
                                        </span>
                                    </a>
                                    <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                                    <a class="dropdown-item badge-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                        </div>
                    </div>
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">Profile</a>
                            <a class="dropdown-item badge-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li> --}}
                @endguest
            </ul>
        </div>
    </div>
</nav>