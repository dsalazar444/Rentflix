<!-- Samuel Martinez Arteaga -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/allied_products/allied_banner.css') }}">
    @yield('styles')
    <title>RentFix</title>
</head>

<body>

    <!-- Allied Products Banner -->
    <a href="{{ route('allied_products.index') }}" class="allied-banner">
        <div class="allied-banner-content">
            <span class="allied-banner-text">{{ __('alliedProducts.titlePage') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </div>
    </a>

    @include('components.header.dispatcher')

    <div class="@yield('content-container-class', 'container my-4')">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/auth/headerProfileMenu.js') }}"></script>
    @stack('scripts')
</body>

</html>