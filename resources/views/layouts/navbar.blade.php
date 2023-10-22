<nav class="navbar navbar-light">
    <div class="navbar-left">
        <div class="logo-area">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img class="dark" src="{{ asset('img/Logo.png') }}" alt="logo">
                <img class="light" src="{{ asset('img/Logo.png') }}" alt="logo">
            </a>
            <a href="#" class="sidebar-toggle">
                <img class="svg" src="{{ asset('img/svg/align-center-alt.svg') }}" alt="img"></a>
        </div>
    </div>
    <!-- ends: navbar-left -->
    <div class="navbar-right">
        <ul class="navbar-right__menu">
            <!-- ends: .nav-flag-select -->
            <li class="nav-author">
                <div class="dropdown-custom">
                    <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('img/author-nav.jpg') }}" alt="" class="rounded-circle">
                        <span class="nav-item__title">{{ auth()->user()->name }}<i class="las la-angle-down nav-item__arrow"></i></span>
                    </a>
                    <div class="dropdown-parent-wrapper">
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="{{ asset('img/author-nav.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div>
                                    <h6>{{ auth()->user()->name }}</h6>
                                    <span>{{ auth()->user()->role->name }}</span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="uil uil-user"></i> Profile</a>
                                    </li>
                                </ul>
                                <a href="{{ route('logout') }}" class="nav-author__signout">
                                    <i class="uil uil-sign-out-alt"></i> Sign Out</a>
                            </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                    </div>
                </div>
            </li>
            <!-- ends: .nav-author -->
        </ul>
        <!-- ends: .navbar-right__menu -->
        <div class="navbar-right__mobileAction d-md-none">
            <a href="#" class="btn-author-action">
                <img class="svg" src="{{ asset('img/svg/more-vertical') }}.svg" alt="more-vertical"></a>
        </div>
    </div>
    <!-- ends: .navbar-right -->
</nav>