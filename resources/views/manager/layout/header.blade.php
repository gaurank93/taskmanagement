<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm"><h3>TM</h3></span>
                    <span class="logo-lg"><h3>Task M App</h3></span>
                </a>
                <a href="#" class="logo logo-light">
                    <span class="logo-sm"><h3 class="text-white mt-4">TM</h3></span>
                    <span class="logo-lg"><h3 class="text-white mt-4">Task M App</h3></span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                    id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
            <!-- App Search-->
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{asset('theme/assets/images/avatar-2.jpg')}}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{ Auth::user()->name}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        <i class="ri-shut-down-line align-middle mr-1 text-danger"></i> <span
                            key="t-logout">Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
