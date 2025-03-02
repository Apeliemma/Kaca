@if(Request::ajax())
    @if(isset($_GET['t_optimized']))
        @yield('t_optimized')
    @elseif(isset($_GET['ta_optimized']))
        @yield('ta_optimized')
    @else
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                           href="{{ url(auth()->user()->role) }}">Home</a></li>
                            @yield('bread_crumb')
                        </ol>
                    </nav>
                    <h1 class="page-header-title system-title">@yield('title')</h1>
                    @yield('below_title')
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    @yield('header_action')
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        @if(auth()->user()->status == 0)
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary alert-outline alert-dismissible" role="alert">
                        <div class="alert-message">
                            Your Account is <span style="text-decoration:underline">In-Active </span>, In case it was
                            wrongly inactivated contact our administrator
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- end page title -->
            @yield('content')
        @endif
    @endif
    @include('common.essential_js')

    <style>
        .displayContent {
            display: block !important;
        }
    </style>
@else
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>{{ isset($page_title) ? $page_title : config('app.name', 'KACA') }}</title>

        <!-- Favicon -->
        {{--        <link rel="apple-touch-icon" sizes="180x180" href="{{url('backend/img/favicon/logo.png')}}">--}}
        <link rel="icon" type="image/png" href="{{url('backend/img/logo.png')}}">
        {{--        <link rel="icon" type="image/png" sizes="16x16" href="{{url('backend/img/favicon/favicon-16x16.png')}}">--}}
        <link rel="manifest" href="{{url('backend/img/favicon/site.webmanifest')}}">

        <!-- Font -->
        {{--        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">--}}

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ url('backend/layouts/front/css/vendor.min.css') }}">

        <link href="{{ url('backend/plugins/select2/select2.min.css')}}" rel="stylesheet"/>
        <link href="{{ url('backend/plugins/select2/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet"/>

        <!-- CSS Front Template -->
        <link href="{{url('backend/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
        <link rel="preload" href="{{ url('backend/layouts/front/css/theme.min.css') }}" data-hs-appearance="default"
              as="style">
        <link rel="preload" href="{{ url('backend/css/icons/icomoon/styles.min.css') }}" data-hs-appearance="default"
              as="style">

        <link href="{{ url('backend/plugins/sweetalert/dist/sweetalert.css') }}" type="text/css" rel="stylesheet">
        <!-- JS Implementing Plugins -->
        <script src="{{ url('backend/layouts/front/js/vendor.min.js') }}"></script>

        <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}"/>
        <!-- Plugins -->

        <script src="{{ url('backend/plugins/toastr/toastr.min.js') }}"></script>
        <link href="{{ url('backend/plugins/fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet"
              type="text/css"/>
        <link type="text/css" href="{{ url('backend/css/animate.min.css') }}" rel="stylesheet"/>
        <link href=" {{ url("backend/plugins/fileinput/themes/explorer/theme.css") }}" media="all" rel="stylesheet"
              type="text/css"/>
        <link rel="stylesheet" href="{{ asset('backend/plugins/printjs/print.min.css') }}" media="all" type="text/css"/>
        <link href="{{ url('backend/css/style.css') }}" media="all" rel="stylesheet" type="text/css"/>


        <style data-hs-appearance-onload-styles>
            * {
                transition: unset !important;
            }

            body {
                opacity: 0;
            }

        </style>


        <script>
            window.hs_config = {
                "autopath": "@@autopath",
                "deleteLine": "hs-builder:delete",
                "deleteLine:build": "hs-builder:build-delete",
                "deleteLine:dist": "hs-builder:dist-delete",
                "previewMode": false,
                "startPath": "/",

                "layoutBuilder": {
                    "extend": {"switcherSupport": false},
                    "header": {"layoutMode": "default", "containerMode": "container-fluid"},
                    "sidebarLayout": "default"
                },
                "themeAppearance": {
                    "layoutSkin": "default",
                    "sidebarSkin": "default",
                    "styles": {
                        "colors": {
                            "primary": "#377dff",
                            "transparent": "transparent",
                            "white": "#fff",
                            "dark": "132144",
                            "gray": {"100": "#f9fafc", "900": "#1e2022"}
                        }, "font": "Inter"
                    }
                },
                "languageDirection": {"lang": "en"},
                "skipFilesFromBundle": {
                    "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "assets/js/demo.js"],
                    "build": ["assets/css/theme.css", "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js", "assets/js/demo.js", "assets/css/theme-dark.css", "assets/css/docs.css", "assets/vendor/icon-set/style.css", "assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js", "assets/js/demo.js"]
                },
                "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
                "copyDependencies": {
                    "dist": {"*assets/js/theme-custom.js": ""},
                    "build": {
                        "*assets/js/theme-custom.js": "",
                        "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                    }
                },
                "buildFolder": "",
                "replacePathsToCDN": {},
                "directoryNames": {"src": "./src", "dist": "./dist", "build": "./build"},
                "fileNames": {
                    "dist": {"js": "theme.min.js", "css": "theme.min.css"},
                    "build": {
                        "css": "theme.min.css",
                        "js": "theme.min.js",
                        "vendorCSS": "vendor.min.css",
                        "vendorJS": "vendor.min.js"
                    }
                },
                "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
            }

        </script>
        <style>
            .icon-moon {
                top: 1px !important;
            }

            .page-header {
                border-bottom: 0.0625rem solid rgba(231, 234, 243, .7);
                padding-bottom: 0.75rem !important; /**2rem */
                margin-bottom: 0.25rem !important; /**2.25rem */
            }

            .badgeButton {
                padding: .35em .65em !important;
                vertical-align: baseline;
                border-radius: .3125rem;
            }

        </style>

    </head>

    <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">

    <script src="{{url('backend/layouts/front/js/hs.theme-appearance.js')}}"></script>

    <script
        src="{{url('backend/layouts/front/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js')}}"></script>

    <!-- ========== HEADER ========== -->

    <header id="header"
            class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered"
            style="background-color: #3c8dbc !important;">
        <div class="navbar-nav-wrap">
            <!-- Logo -->
            <a class="navbar-brand" href="" aria-label="Front">
                <img class="navbar-brand-logo" src="{{ url('backend/img/logo.png') }}" alt="Logo"
                     data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="{{ url('backend/img/logo.png') }}" alt="Logo"
                     data-hs-theme-appearance="default">
            </a>
            <!-- End Logo -->

            <div class="navbar-nav-wrap-content-start">
                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler"
                        style="opacity: 1">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align"
                       data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align"
                       data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <div class="navbar-nav-wrap-content-end">
                <!-- Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
                            <?php
                            $notifications = request()->user()->notifications()->where('read_at', null)->paginate(7);
                            ?>
                        @includeIf('common.notifications',['notifications'=>$notifications])

                    </li>

                    <li class="nav-item ">
                        <h3 class="nav-link text-white">{{ Auth::user()->name }}</h3>
                    </li>
                    <li class="nav-item">
                        <!-- Account -->
                        <div class="dropdown">
                            <a class="navbar-dropdown-account-wrapper" href="javascript:" id="accountNavbarDropdown"
                               data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"
                               data-bs-dropdown-animation>
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" width="160" height="160"
                                         src="{{ asset("backend/img/user.jpg") }}"
                                         alt="Image Description">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div
                                class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account"
                                aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                <div class="dropdown-item-text">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm avatar-circle">

                                            <img width="160" height="160" class="avatar-img"
                                                 src="{{ asset("backend/img/user.jpg") }}"
                                                 alt="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                            <p class="card-text text-body">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item load-page" href="{{url('user/profile')}}">Profile &amp;
                                    account</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();  document.getElementById('logout-form').submit();">Sign
                                    out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <!-- End Account -->
                    </li>
                </ul>
                <!-- End Navbar -->
            </div>
        </div>
    </header>

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->

    <aside
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-dark navbar-dark navbar-vertical-aside-initialized d-print-none">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">
                <!-- Logo -->

                <h3 class="text-white text-center mt-4">KACA</h3>


                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler"
                        style="opacity: 1">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align"
                       data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align"
                       data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                        <small class="bi-three-dots nav-subtitle-replacer"></small>
                        <span class="dropdown-header ">Navigation</span>
                        <!-- Collapse -->
                        <div id="navbarVerticalMenuPagesMenu">
                            @isset($real_menus)
                                @foreach($real_menus as $menu)
                                    @if($menu->type=='single' && @$menu->menus)
                                        <div class="nav-item">
                                            <a class="nav-link load-page" href="{{ url($menu->menus->url) }}"
                                               data-placement="left">
                                                <i class="{{ $menu->menus->icon }} nav-icon icon-moon"></i>
                                                <span class="nav-link-title">{{ $menu->menus->label }}</span>
                                            </a>
                                        </div>
                                    @elseif($menu->type=='many')
                                        <div class="nav-item">
                                            <a class="nav-link dropdown-toggle "
                                               href="#{{$menu->slug}}"
                                               role="button" data-bs-toggle="collapse"
                                               data-bs-target="#{{$menu->slug}}" aria-expanded="false"
                                               aria-controls="{{$menu->slug}}">
                                                <i class="icon-moon {{$menu->icon}} nav-icon"></i>
                                                <span class="nav-link-title"> {{ $menu->label }} </span>
                                            </a>

                                            <div id="{{$menu->slug}}" class="nav-collapse collapse "
                                                 data-bs-parent="#navbarVerticalMenuPagesMenu">
                                                @foreach($menu->children as $drop)
                                                    @if($drop->label)
                                                        <a class="nav-link load-page"
                                                           href="{{ url($drop->url) }}"> {{ $drop->label }}</a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endisset
                        </div>
                    </div>

                </div>
                <!-- End Content -->

                <!-- Footer -->
                <div class="navbar-vertical-footer">
                    <ul class="navbar-vertical-footer-list">

                        {{--                        <li class="navbar-vertical-footer-list-item">--}}
                        {{--                            <!-- Other Links -->--}}
                        {{--                            <div class="dropdown dropup">--}}
                        {{--                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"--}}
                        {{--                                        id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false"--}}
                        {{--                                        data-bs-dropdown-animation>--}}
                        {{--                                    <i class="bi-info-circle"></i>--}}
                        {{--                                </button>--}}

                        {{--                                <div class="dropdown-menu navbar-dropdown-menu-borderless"--}}
                        {{--                                     aria-labelledby="otherLinksDropdown">--}}
                        {{--                                    <span class="dropdown-header">Help</span>--}}

                        {{--                                    <div class="dropdown-divider"></div>--}}
                        {{--                                    <span class="dropdown-header">Contacts</span>--}}
                        {{--                                    <a class="dropdown-item" href="#">--}}
                        {{--                                        <i class="bi-chat-left-dots dropdown-item-icon"></i>--}}
                        {{--                                        <span class="text-truncate" title="Contact support">Contact support</span>--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <!-- End Other Links -->--}}
                        {{--                        </li>--}}
                    </ul>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </aside>

    <!-- End Navbar Vertical -->

    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content system-container container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-sm mb-0 mb-sm-0">
                        <nav aria-label="breadcrumb" class="system-breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                               href="{{ url(auth()->user()->role) }}">Home</a></li>
                                @yield('bread_crumb')
                            </ol>
                        </nav>
                        <h4 class="page-header-title system-title">@yield('title')</h4>
                        <p class="page-header-text">@yield('header-text')</p>
                        @yield('below_title')
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        @yield('header_action')
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div>
                @if(auth()->user()->status == 0)
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-primary alert-outline alert-dismissible" role="alert">
                                <div class="alert-message">
                                    Your Account is <span style="text-decoration:underline">In-Active </span>, In case
                                    it was wrongly inactivated contact our administrator
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @yield('content')
                @endif
            </div>
            <!-- End Row -->
        </div>
        <!-- End Content -->

        <!-- Footer -->

        <div class="footer">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <p class="fs-6 mb-0">&copy; {{ date('Y') }}. <span class="d-none d-sm-inline-block"> KACA</span>
                    </p>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <div class="d-flex justify-content-end">
                        <!-- List Separator -->
                        <ul class="list-inline list-separator">
                            <li class="list-inline-item">
                                <a class="list-separator-link" href="#">FAQ</a>
                            </li>

                            <li class="list-inline-item">
                                <a class="list-separator-link" href="#">License</a>
                            </li>

                            <li class="list-inline-item">
                                <!-- Keyboard Shortcuts Toggle -->
                                <button class="btn btn-ghost-secondary btn btn-icon btn-ghost-secondary rounded-circle"
                                        type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasKeyboardShortcuts"
                                        aria-controls="offcanvasKeyboardShortcuts">
                                    <i class="bi-command"></i>
                                </button>
                                <!-- End Keyboard Shortcuts Toggle -->
                            </li>
                        </ul>
                        <!-- End List Separator -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>

        <!-- End Footer -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


    <!-- ========== SECONDARY CONTENTS ========== -->


    <!-- ========== END SECONDARY CONTENTS ========== -->


    <!-- JS Front -->

    <script src="{{  url('backend/layouts/front/js/theme.min.js') }}"></script>
    <!-- Application essentials-->
    <script src="{{ asset('backend/js/jquery.history.js') }}"></script>
    <script src="{{ asset("backend/plugins/printjs/print.min.js") }}"></script>
    <script src="{{ url('backend/js/jquery.form.js') }}"></script>
    <script src="{{ url('backend/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{url('backend/plugins/select2/select2.full.min.js')}}"></script>
    <script defer src="{{ url('backend/plugins/jodit/jodit.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/spartan/spartan-multi-image-picker-min.js') }}"></script>
    <!--
    <script src="// url("backend/plugins/fileinput/js/backend/plugins/sortable.min.js") "></script>
    -->
    <script src="{{ url("backend/plugins/fileinput/js/fileinput.min.js") }}"></script>
    <script src="{{ url("backend/plugins/fileinput/themes/fas/theme.js") }}"></script>
    <script src="{{ url("backend/plugins/fileinput/themes/explorer/theme.js") }}"></script>
    <script src="{{ url("backend/plugins/datetimepicker/jquery.datetimepicker.js") }}"></script>

    @include('common.javascript')
    @yield('footer_js')
    @stack('footer-scripts')
    <input type="hidden" name="material_page_loaded" value="1">

    <!-- JS Plugins Init. -->
    <script>
        (function () {
            window.onload = function () {
                // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                new HSSideNav('.js-navbar-vertical-aside').init()
            }
        })()
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

    </body>
    </html>

@endif
