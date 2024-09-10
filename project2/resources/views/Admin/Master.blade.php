<!DOCTYPE html>
<html lang="en">
@include('Admin.Partials.Head')
<body id="page-top">

    <div id="wrapper">
        @include('Admin.Partials.Sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('Admin.Partials.Header')
                @yield('Content')
            </div>
            @include('Admin.Partials.Footer')
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{asset ('adminAssets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('adminAssets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset ('adminAssets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset ('adminAssets/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset ('adminAssets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset ('adminAssets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset ('adminAssets/js/demo/datatables-demo.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
        var selectedValue = localStorage.getItem('selectedOption');
        if (selectedValue) {
            $('input[type="radio"][name="filter"][value="' + selectedValue + '"]').prop('checked', true);
        }

        $('#applyBtn').click(function() {
            var selectedOption = $('input[type="radio"][name="filter"]:checked').val();
            console.log(selectedOption);
            localStorage.setItem('selectedOption', selectedOption);
        });
        });
    </script>

</body>

</html>