<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Auction</title>

    <!-- inject:css-->
    @include('includes.styles')
</head>

<body class="layout-light side-menu">
    <div class="mobile-author-actions"></div>
    <header class="header-top">
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
                                <span class="nav-item__title"><i class="las la-angle-down nav-item__arrow"></i></span>
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <div class="nav-author__info">
                                        <div class="author-img">
                                            <img src="{{ asset('img/author-nav.jpg') }}" alt="" class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6></h6>
                                            <span></span>
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
    </header>
    <main class="main-content">
        <div class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse" id="sidebar">
                <div class="sidebar__menu-group">
                    <ul class="sidebar_nav">
                        <li>
                            <a href="{{ route('dashboard') }}" class="{{ request()->segment(1) == '' ? 'active' : null }}">
                                <span class="nav-icon uil uil-create-dashboard"></span>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="contents">
            <div class="crm mb-25">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <!-- Start: error page -->
                            <div class="min-vh-100 content-center">
                                <div class="error-page text-center">
                                    <img src="{{ asset('img/svg/404.svg') }}" alt="404" class="svg">
                                    <div class="error-page__title">404</div>
                                    <h5 class="fw-500">Sorry! the page you are looking for doesn't exist.</h5>
                                    <div class="content-center mt-30">
                                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-default btn-squared px-30">Return Home</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End: error page -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </main>
    <div id="overlayer">
        <div class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    @include('includes.scripts')
    @yield('custom-script')
</body>

</html>