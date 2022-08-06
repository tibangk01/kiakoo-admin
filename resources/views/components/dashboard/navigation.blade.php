<nav class="main-header navbar navbar-expand navbar-dark-primary navbar-light border-bottom-0 text-sm">

    <!-- Left navbar links -->
    <ul class="navbar-nav">

        <li class="nav-item">

            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

        </li>

        <li class="nav-item d-none d-sm-inline-block"></li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Navbar Search -->
        <li class="nav-item">

            <a class="nav-link" data-widget="navbar-search" href="#" role="button">

                <i class="fas fa-search"></i>

            </a>

            <div class="navbar-search-block">

                <form class="form-inline">

                    <div class="input-group input-group-sm">

                        <input class="form-control form-control-navbar" type="search" placeholder="Rechercher"
                            aria-label="Search">

                        <div class="input-group-append">

                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>

                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

        <!-- Profil -->
        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="far fa-user"></i>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header" style="background-color:#17a2b8">

                    <img src="{{ Auth::user()->getMedia('avatar')->first()->getUrl('thumb') ?? asset('adminLte/img/avatar-default.png') }}" class="img-circle" alt="User Image" />
                    <p>
                        {{ Auth::user()->employee->human->last_name .' '. Auth::user()->employee->human->first_name }}
                        <small>{{  Auth::user()->employee->work->name }}</small>
                    </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">

                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <div class="d-flex">
                            <div class="mr-auto p-2">
                                <a href="{{ route('profile.index') }}" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i>
                                    Profil</a>
                            </div>

                            <div class="p-2">

                                <a class="btn btn-info btn-flat text-dark" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();this.closest('form').submit();">
                                    <i class="fa fa-arrow-circle-right"></i> {{ __('Déconnexion') }}
                                </a>

                            </div>

                        </div>

                    </form>

                </li>
            </ul>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
