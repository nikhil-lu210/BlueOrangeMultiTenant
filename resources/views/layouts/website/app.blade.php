<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-navbar-fixed layout-wide" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" data-template="front-pages">

<head>
    {{-- Meta Starts --}}
    @include('layouts.website.partials.metas')
    {{-- Meta Ends --}}

    <title>{{ config('app.name') }} || @yield('page_title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(config('app.favicon')) }}" />

    <!-- Start css -->
    @include('layouts.website.partials.stylesheet')
    <!-- End css -->
</head>

<body>
    {{-- <!-- Navbar: Start --> --}}
    @include('layouts.website.partials.navbar')
    {{-- <!-- Navbar: End --> --}}

    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        @if ($errors->any())
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <i class="ti ti-ban mr-3" style="margin-top: -3px;"></i>
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <i class="ti ti-ban mr-3" style="margin-top: -3px;"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Start row -->
        @yield('content')
        <!-- End row -->
    </div>

    <!-- / Sections:End -->

    {{-- <!-- Footer: Start --> --}}
    @include('layouts.website.partials.footer')
    {{-- <!-- Footer: End --> --}}

    <!-- Start js -->
    @include('layouts.website.partials.scripts')
    <!-- End js -->

    {{-- Sweetalert --}}
    @include('sweetalert::alert')
</body>

</html>
