<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar="light">

    <head>
    <meta charset="utf-8" />
    <title>Open More</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="OpenMoreOnline" name="description" />
    <meta content="OpenMoreOnline" name="author" />
    <!-- App favicon -->
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
        @include('layouts.head-css')
  </head>

    @yield('body')

    @yield('content')

    @include('layouts.vendor-scripts')
    </body>
</html>
