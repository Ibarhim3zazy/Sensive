<!DOCTYPE html>
<html lang="en" data-assets="{{ asset('assets/img') }}">

@include('theme.partials.head')

<body>

    @include('theme.partials.header')

    @yield('content')

    @include('theme.partials.footer')

    @include('theme.partials.scripts')

</body>

</html>