<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/nouislider/nouislider.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/front-main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/front-page-landing.js') }}"></script>

{{-- Desktop Browser Notification --}}
{{-- <script src="{{ asset('assets/js/custom_js/notification/browser_notification.js') }}"></script> --}}

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

{{-- Custom Js by NIKHIL --}}
<script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- Page JS -->
@yield('script_links')

@yield('custom_script')
