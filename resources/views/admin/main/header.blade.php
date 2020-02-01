<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('admin')}}">
                <b>SIMPAS</b>
                <span>homepage</span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0 ">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item">
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Welcome {{ __('Admin') }} <span></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <a class="nav-link waves-effect waves-dark" href="{{ route('admin.logout') }}" aria-haspopup="true" aria-expanded="false">Logout</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
