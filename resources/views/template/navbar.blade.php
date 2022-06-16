<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <img src="{{ asset('img/logo_idola.png') }}" alt="logo aplikasi" style="max-height: 50px;" title="Logo Aplikasi">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navDropdown"
            aria-controls="navDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (Auth::user()->role == 'admin')
        <div class="navbar-collapse collapse d-flex-xl justify-content-xl-end" id="navDropdown">
            <ul class="navbar-nav mr-5">
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('/') ? 'nav-active' : '' }}" href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ Request::is('wfm*') ? 'nav-active' : '' }} dropdown-toggle" href=""
                        id="deploymentMenu" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Deployment
                    </a>
                    <div class="dropdown-menu dropmenu" aria-labelledby="deploymentMenu">
                        <a class="dropdown-item" href="{{ route('deployment.create') }}"><i class="las la-plus mr-3"></i>New
                            Order</a>
                        <a class="dropdown-item" href="{{ route('deployment.index') }}"><i class="las la-pen mr-3"></i>Update
                            Order</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ Request::is('progress_lapangan*') ? 'nav-active' : '' }} dropdown-toggle"
                        href="#" id="progressMenu" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Progress Lapangan
                    </a>
                    <div class="dropdown-menu dropmenu" aria-labelledby="progressMenu">
                        <a class="dropdown-item" href="{{ route('progress.create') }}"><i
                                class="las la-plus mr-3"></i>New Progress</a>
                        <a class="dropdown-item" href="{{ route('progress.index') }}"><i
                                class="las la-pen mr-3"></i>Update Progress</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ Request::is('assurance*') ? 'nav-active' : '' }} dropdown-toggle"
                        href="#" id="progressMenu" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Assurance
                    </a>
                    <div class="dropdown-menu dropmenu" aria-labelledby="progressMenu">
                        <a class="dropdown-item" href="{{ route('assurance.create') }}"><i
                                class="las la-plus mr-3"></i>New Assurance</a>
                        <a class="dropdown-item" href="{{ route('assurance.index') }}"><i
                                class="las la-pen mr-3"></i>Update Assurance</a>
                    </div>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('rekap*') ? 'nav-active' : '' }}"
                        href="{{ route('rekap.index') }}">Rekap</a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('db_olo*') ? 'nav-active' : '' }}" href="{{route('db_olo.index')}}" id="databaseMenu">
                        Database
                    </a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('disconnect*') ? 'nav-active' : '' }}"
                        href="{{ route('disconnect.index') }}">Disconnect</a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('management*') ? 'nav-active' : '' }}"
                        href="{{ route('management.index') }}">User</a>
                </li>
            </ul>
        </div>

        <ul class="navbar-nav ml-2">
            <li class="nav-item dropdown">
                <img src="{{ asset('img/user.png') }}" role="button" alt="user profile"
                    class="user-pic rounded-circle dropdown-toggle" id="user-menu" data-toggle="dropdown"
                    title="Klik Untuk Selengkapnya" aria-haspopup="true" aria-expanded="false" style="width: 48px">
                <div class="dropdown-menu dropdown-menu-right w-25" aria-labelledby="user-menu">
                    <a class="dropdown-item text-center">{{ auth()->user()->name }}</a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"
                            onclick="return confirm('Apakah Anda Ingin Logout?')"><i
                                class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>

        @elseif (Auth::user()->role == 'editor')
        <div class="navbar-collapse collapse d-flex-xl justify-content-xl-end" id="navDropdown">
            <ul class="navbar-nav mr-5">
            <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('/') ? 'nav-active' : '' }}" href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link {{ Request::is('wfm*') ? 'nav-active' : '' }} dropdown-toggle" href=""
                        id="deploymentMenu" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Deployment
                    </a>
                    <div class="dropdown-menu dropmenu" aria-labelledby="deploymentMenu">
                        <a class="dropdown-item" href="{{ route('deployment.create') }}"><i class="las la-plus mr-3"></i>New
                            Order</a>
                        <a class="dropdown-item" href="{{ route('deployment.index') }}"><i class="las la-pen mr-3"></i>Update
                            Order</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ Request::is('progress_lapangan*') ? 'nav-active' : '' }} dropdown-toggle"
                        href="#" id="progressMenu" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Progress Lapangan
                    </a>
                    <div class="dropdown-menu dropmenu" aria-labelledby="progressMenu">
                        <a class="dropdown-item" href="{{ route('progress.create') }}"><i
                                class="las la-plus mr-3"></i>New Progress</a>
                        <a class="dropdown-item" href="{{ route('progress.index') }}"><i
                                class="las la-pen mr-3"></i>Update Progress</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ Request::is('assurance*') ? 'nav-active' : '' }} dropdown-toggle"
                        href="#" id="progressMenu" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Assurance
                    </a>
                    <div class="dropdown-menu dropmenu" aria-labelledby="progressMenu">
                        <a class="dropdown-item" href="{{ route('assurance.create') }}"><i
                                class="las la-plus mr-3"></i>New Assurance</a>
                        <a class="dropdown-item" href="{{ route('assurance.index') }}"><i
                                class="las la-pen mr-3"></i>Update Assurance</a>
                    </div>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('rekap*') ? 'nav-active' : '' }}"
                        href="{{ route('rekap.index') }}">Rekap</a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('db_olo*') ? 'nav-active' : '' }}" href="{{route('db_olo.index')}}" id="databaseMenu">
                        Database
                    </a>
                </li>

                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('disconnect*') ? 'nav-active' : '' }}"
                        href="{{ route('disconnect.index') }}">Disconnect</a>
                </li>
                
            </ul>
        </div>

        <ul class="navbar-nav ml-2">
            <li class="nav-item dropdown">
                <img src="{{ asset('img/user.png') }}" role="button" alt="user profile"
                    class="user-pic rounded-circle dropdown-toggle" id="user-menu" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="width: 48px">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-menu">
                    <a class="dropdown-item text-center">{{ auth()->user()->name }}</a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"
                            onclick="return confirm('Apakah Anda Ingin Logout?')"><i
                                class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
        @else
        <div class="navbar-collapse collapse d-flex-xl justify-content-xl-end" id="navDropdown">
            <ul class="navbar-nav mr-5">
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('/') ? 'nav-active' : '' }}" href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('deployment*') ? 'nav-active' : '' }}" href="{{route('deployment.index')}}" id="deploymentMenu">
                        Deployment
                    </a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('progress_lapangan*') ? 'nav-active' : '' }}" href="{{route('progress.index')}}" id="progressMenu">
                        Progress Lapangan
                    </a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('assurance*') ? 'nav-active' : '' }}" href="{{route('assurance.index')}}" id="progressMenu">
                        Assurance
                    </a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('rekap*') ? 'nav-active' : '' }}"
                        href="{{ route('rekap.index') }}">Rekap</a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('db_olo*') ? 'nav-active' : '' }}" href="{{route('db_olo.index')}}" id="databaseMenu">
                        Database
                    </a>
                </li>

                <li class="nav-item menu">
                    <a class="nav-link {{ Request::is('disconnect*') ? 'nav-active' : '' }}"
                        href="{{ route('disconnect.index') }}">Disconnect</a>
                </li>
            </ul>
        </div>

        <ul class="navbar-nav ml-2">
            <li class="nav-item dropdown">
                <img src="{{ asset('img/user.png') }}" role="button" alt="user profile"
                    class="user-pic rounded-circle dropdown-toggle" id="user-menu" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="width: 48px">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-menu">
                    <a class="dropdown-item text-center">{{ auth()->user()->name }}</a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"
                            onclick="return confirm('Apakah Anda Ingin Logout?')"><i
                                class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
        @endif
        
    </div>
    
</nav>
