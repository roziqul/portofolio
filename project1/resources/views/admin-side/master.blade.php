<!DOCTYPE html>
<html lang="en">
@include('admin-side.partials.head')
    <body>
        <div id="app">
            @include('sweetalert::alert')
            <div class="main-wrapper">
                @include('admin-side.partials.navbar')
                @include('admin-side.partials.sidebar')
                <div class="main-content" id="main-content">
                    @yield('content')
                </div>
                @include('admin-side.partials.footer')
            </div>
        </div>
        @include('admin-side.partials.scripts')
    </body>
</html>