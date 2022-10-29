<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
    <title>
        {{ env('APP_NAME') }}
    </title>

    <!-- Metas -->
    @if (env('IS_DEMO'))
        <meta name="keywords"
              content="creative tim, updivision, material, html dashboard, laravel, livewire, laravel livewire, alpine.js, html css dashboard laravel, material dashboard laravel, livewire material dashboard, material admin, livewire dashboard, livewire admin, web dashboard, bootstrap 5 dashboard laravel, bootstrap 5, css3 dashboard, bootstrap 5 admin laravel, material dashboard bootstrap 5 laravel, frontend, responsive bootstrap 5 dashboard, material dashboard, material laravel bootstrap 5 dashboard"/>
        <meta name="description"
              content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js"/>
        <meta itemprop="name" content="Material Dashboard 2 Laravel Livewire by Creative Tim & UPDIVISION"/>
        <meta itemprop="description"
              content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js"/>
        <meta itemprop="image"
              content="https://s3.amazonaws.com/creativetim_bucket/products/600/original/material-dashboard-laravel-livewire.jpg"/>
        <meta name="twitter:card" content="product"/>
        <meta name="twitter:site" content="@creativetim"/>
        <meta name="twitter:title" content="Material Dashboard 2 Laravel Livewire by Creative Tim & UPDIVISION"/>
        <meta name="twitter:description"
              content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js"/>
        <meta name="twitter:creator" content="@creativetim"/>
        <meta name="twitter:image"
              content="https://s3.amazonaws.com/creativetim_bucket/products/600/original/material-dashboard-laravel-livewire.jpg"/>
        <meta property="fb:app_id" content="655968634437471"/>
        <meta property="og:title" content="Material Dashboard 2 Laravel Livewire by Creative Tim & UPDIVISION"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="https://www.creative-tim.com/live/material-dashboard-laravel-livewire"/>
        <meta property="og:image"
              content="https://s3.amazonaws.com/creativetim_bucket/products/600/original/material-dashboard-laravel-livewire.jpg"/>
        <meta property="og:description"
              content="Dozens of handcrafted UI components, Laravel authentication, register & profile editing, Livewire & Alpine.js"/>
        <meta property="og:site_name" content="Creative Tim"/>
    @endif
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/96ea037ffc.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets') }}/css/material-dashboard.css?v=3.0.0" rel="stylesheet"/>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewireStyles
</head>
<body
    class="g-sidenav-show">

{{ $slot }}

@if(session()->has('success'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade show p-2 bg-white" role="alert" aria-live="assertive" id="toast"
             aria-atomic="true">
            <div class="toast-header border-0">
                <i class="material-icons text-success me-2">
                    check
                </i>
                <span class="me-auto font-weight-bold">Success</span>
                <small class="text-body">{!! \Carbon\Carbon::now()->format('h:s')  !!}</small>
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast"
                   aria-label="Close"></i>
            </div>
            <hr class="horizontal dark m-0">
            <div class="toast-body">
                {!! session()->get('success')!!}
            </div>
        </div>
    </div>
@endif
@if(session()->has('warning'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade show p-2 bg-white" role="alert" aria-live="assertive" id="toast"
             aria-atomic="true">
            <div class="toast-header border-0">
                <i class="fa-solid fa-circle-exclamation me-2 text-warning fa-lg"></i>
                <span class="me-auto font-weight-bold">Success</span>
                <small class="text-body">{!! \Carbon\Carbon::now()->format('h:s')  !!}</small>
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast"
                   aria-label="Close"></i>
            </div>
            <hr class="horizontal dark m-0">
            <div class="toast-body">
                {!! session()->get('warning')!!}
            </div>
        </div>
    </div>
@endif
@if(session()->has('error'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade show p-2 bg-white" role="alert" aria-live="assertive" id="toast"
             aria-atomic="true">
            <div class="toast-header border-0">
                <i class="material-icons text-danger me-2">
                    campaign
                </i>
                <span class="me-auto font-weight-bold">Success</span>
                <small class="text-body">{!! \Carbon\Carbon::now()->format('h:s')  !!}</small>
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast"
                   aria-label="Close"></i>
            </div>
            <hr class="horizontal dark m-0">
            <div class="toast-body">
                {!! session()->get('error')!!}
            </div>
        </div>
    </div>
@endif

<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
@stack('js')
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.0') }}"></script>
@livewireScripts
</body>
</html>
