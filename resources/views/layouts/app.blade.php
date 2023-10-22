<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bullwhip | TK4 - DAIM</title>

    <!-- inject:css-->
    @include('includes.styles')
</head>

<body class="layout-light side-menu">
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        @include('layouts.navbar')
    </header>
    <main class="main-content">
        <div class="sidebar-wrapper">
            @include('layouts.sidebar')
        </div>

        <div class="contents">            
            <div class="crm mb-25">
                @yield('main-content')
                @yield('modal')
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