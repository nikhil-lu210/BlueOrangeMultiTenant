<meta charset="utf-8" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="description" content="{{ config('app.name') }} Web Application | {{ config('app.name') }}" />


@yield('meta_tags')
