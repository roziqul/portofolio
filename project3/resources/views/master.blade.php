<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    <div id="app">
        <div class="main-wrapper">

            @include('partials.navbar')

            @include('partials.sidebar')

            <div class="main-content" id="main-content">

                @yield('content')

            </div>

            @include('partials.footer')

        </div>
    </div>

    @include('partials.scripts')

</body>

</html>