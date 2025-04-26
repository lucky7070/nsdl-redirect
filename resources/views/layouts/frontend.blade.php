<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="language" content="english" />

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ $site_settings['application_name'] }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/' . $site_settings['favicon']) }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/' . $site_settings['favicon']) }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/' . $site_settings['favicon']) }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . $site_settings['favicon']) }}" />

    <meta name="description" content="{{ @$site_settings['meta_description'] }}" />
    <meta name="keywords" content="{{ @$site_settings['meta_keywords'] }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-pro/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>

<body>
    <header>
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-center border-bottom p-3 bg-theme">
            <a href="{{ route('home') }}" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                <img class="logo" src="{{ asset("storage/" . $site_settings['logo']) }}" alt={{ $site_settings['application_name'] }} />
            </a>
            <nav class="d-flex justify-content-end mt-2 mt-md-0 gap-3">
                <a target="_blank" class="py-2 text-decoration-none fs-5 text-white"
                    href="{{ $site_settings['facebook'] }}">
                    <i class="fa-brands fa-facebook "></i>
                </a>
                <a target="_blank" class="py-2 text-decoration-none fs-5 text-white"
                    href="{{ $site_settings['twitter'] }}">
                    <i class="fa-brands fa-twitter "></i>
                </a>
                <a target="_blank" class="py-2 text-decoration-none fs-5 text-white"
                    href="{{ $site_settings['linkedin'] }}">
                    <i class="fa-brands fa-linkedin "></i>
                </a>
                <a target="_blank" class="py-2 text-decoration-none fs-5 text-white"
                    href="{{ $site_settings['instagram'] }}">
                    <i class="fa-brands fa-instagram "></i>
                </a>
            </nav>
        </div>
    </header>
    <main style="min-height: calc(100vh - 170px);">
        @yield('content')
    </main>
    <footer class="p-3 border-top bg-theme">
        <div class="row">
            <div class="col-md-6">
                <span class="text-white">{{ $site_settings['copyright'] }}</span>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end gap-3">
                    <a target="_blank" class="text-white" href="{{ $site_settings['instagram'] }}"
                        aria-label="Instagram">
                        <i class="fa-brands fa-instagram fs-5"></i>
                    </a>
                    <a target="_blank" class="text-white" href="{{ $site_settings['facebook'] }}" aria-label="Facebook">
                        <i class="fa-brands fa-facebook fs-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    @yield('js')
    @include('partial.toastr')
</body>

</html>