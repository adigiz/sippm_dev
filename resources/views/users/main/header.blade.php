<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/users')}}">
                <b>SIMPAS</b>
                <span>homepage</span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0 ">
                <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                        href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                <li class="nav-item">
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if(\App\Profile::where('user_id', \Illuminate\Support\Facades\Auth::id())->exists())
                            @if(\App\Profile::where('user_id',\Illuminate\Support\Facades\Auth::id())->first()->avatar == NULL)
                                <img src="/uploads/avatar/default.jpg" alt="user"
                                     class="profile-pic m-r-5"/>{{\App\Profile::where('user_id',\Illuminate\Support\Facades\Auth::id())->first()->name}}
                                <span class="caret"></span>
                    </a>
                            @else
                                <img src="/uploads/avatar/{{\App\Profile::where('user_id',\Illuminate\Support\Facades\Auth::id())->first()->avatar}}"
                                     alt="user"
                                     class="profile-pic m-r-5"/>{{\App\Profile::where('user_id',\Illuminate\Support\Facades\Auth::id())->first()->name}}
                                <span class="caret"></span>
                            @endif
                        @else
                            Selamat Datang
                        @endif
                        <ul class="dropdown-menu" role="menu">
                            <a class="nav-link waves-effect waves-dark" href="{{ route('gantiPassword') }}"><i
                                        class="mdi mdi-key" aria-hidden="true"></i>
                                Ganti Password</a>
                            <a class="nav-link waves-effect waves-dark" href="{{ route('users.logout') }}"
                               aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                Logout</a>
                        </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
