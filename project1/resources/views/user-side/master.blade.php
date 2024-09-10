<!DOCTYPE html>
<html lang="en">
@include('user-side.partials.head')
<body class="index-page">
    @include('user-side.partials.header')
        @yield('content')
    @include('user-side.partials.footer')
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    {{-- <div id="preloader"></div> --}}
    @include('user-side.partials.scripts')
</body>
</html>