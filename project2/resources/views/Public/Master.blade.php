<!DOCTYPE html>
<html lang="en">
@include('Public.Partials.Head')
<body id="page-top">

    <div id="wrapper">
        @include('Public.Partials.Sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('Public.Partials.Header')
                @yield('Content')
            </div>
            @include('Public.Partials.Footer')
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

    {{-- Verifikasi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('nama');
            input.addEventListener('input', function() {
                var currentValue = input.value;
                var filteredValue = currentValue.replace(/[^A-Za-z\s]/g, '');
                if (currentValue !== filteredValue) {
                    input.value = filteredValue;
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('nisn');
        var maxLength = 10;

            input.addEventListener('input', function() {
                var currentValue = input.value;
                if (currentValue.length > maxLength) {
                    input.value = currentValue.slice(0, maxLength);
                }
            });
        });
    </script>
    {{-- Biodata --}}
    <script>
		document.addEventListener('DOMContentLoaded', function() {
		var input = document.getElementById('pob');
			input.addEventListener('input', function() {
				var currentValue = input.value;
				var filteredValue = currentValue.replace(/[^A-Za-z\s]/g, '');
				if (currentValue !== filteredValue) {
				    input.value = filteredValue;
				}
			});
		});
	</script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('phone');
        var maxLength = 12;

        input.addEventListener('input', function() {
            var currentValue = input.value;
            if (currentValue.length > maxLength) {
                input.value = currentValue.slice(0, maxLength);
            }
        });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('dob');

        input.addEventListener('change', function() {
            var selectedDate = new Date(input.value);
            var today = new Date();

            if (selectedDate >= today) {
            input.value = '';
            alert('Please select a date before today.');
            }
        });
        });
    </script>

    {{-- Ortu --}}
    <script>
		document.addEventListener('DOMContentLoaded', function() {
		var input = document.getElementById('dname')
			input.addEventListener('input', function() {
				var currentValue = input.value;
				var filteredValue = currentValue.replace(/[^A-Za-z\s]/g, '');
				if (currentValue !== filteredValue) {
				    input.value = filteredValue;
				}
			});
		});
		document.addEventListener('DOMContentLoaded', function() {
		var input = document.getElementById('djob')
			input.addEventListener('input', function() {
				var currentValue = input.value;
				var filteredValue = currentValue.replace(/[^A-Za-z\s]/g, '');
				if (currentValue !== filteredValue) {
				    input.value = filteredValue;
				}
			});
		});
        document.addEventListener('DOMContentLoaded', function() {
		var input = document.getElementById('mname')
			input.addEventListener('input', function() {
				var currentValue = input.value;
				var filteredValue = currentValue.replace(/[^A-Za-z\s]/g, '');
				if (currentValue !== filteredValue) {
				    input.value = filteredValue;
				}
			});
		});
        document.addEventListener('DOMContentLoaded', function() {
		var input = document.getElementById('mjob')
			input.addEventListener('input', function() {
				var currentValue = input.value;
				var filteredValue = currentValue.replace(/[^A-Za-z\s]/g, '');
				if (currentValue !== filteredValue) {
				    input.value = filteredValue;
				}
			});
		});
        document.addEventListener('DOMContentLoaded', function() {
		var input = document.getElementById('wname')
			input.addEventListener('input', function() {
				var currentValue = input.value;
				var filteredValue = currentValue.replace(/[^A-Za-z\s]/g, '');
				if (currentValue !== filteredValue) {
				    input.value = filteredValue;
				}
			});
		});
        document.addEventListener('DOMContentLoaded', function() {
		var input = document.getElementById('wjob')
			input.addEventListener('input', function() {
				var currentValue = input.value;
				var filteredValue = currentValue.replace(/[^A-Za-z\s]/g, '');
				if (currentValue !== filteredValue) {
				    input.value = filteredValue;
				}
			});
		});
        document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('dphone');
        var maxLength = 12;

            input.addEventListener('input', function() {
                var currentValue = input.value;
                if (currentValue.length > maxLength) {
                    input.value = currentValue.slice(0, maxLength);
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('mphone');
        var maxLength = 12;

            input.addEventListener('input', function() {
                var currentValue = input.value;
                if (currentValue.length > maxLength) {
                    input.value = currentValue.slice(0, maxLength);
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('wphone');
        var maxLength = 12;

            input.addEventListener('input', function() {
                var currentValue = input.value;
                if (currentValue.length > maxLength) {
                    input.value = currentValue.slice(0, maxLength);
                }
            });
        });
	</script>

    {{-- Berkas --}}
    <script type="text/javascript">
        function checkR1(file){
            var file01 = document.getElementById('eR1').value;
            if(file.value.length==''){
                document.getElementById('sR1').style.display = "";
                document.getElementById('eR1').style.display = "none";
                document.getElementById('bR1').style.display = "none";
            }else{
                document.getElementById('sR1').style.display = "none";
                document.getElementById('eR1').style.display = "";
                document.getElementById('bR1').style.display = "";
            }
            document.getElementById('eR1').innerHTML = file01;
        }
        function checkR2(file){
            var file02 = document.getElementById('eR2').value;
            if(file.value.length==''){
                document.getElementById('sR2').style.display = "";
                document.getElementById('eR2').style.display = "none";
                document.getElementById('bR2').style.display = "none";
            }else{
                document.getElementById('sR2').style.display = "none";
                document.getElementById('eR2').style.display = "";
                document.getElementById('bR2').style.display = "";
            }
            document.getElementById('eR2').innerHTML = file02;
        }
        function checkR3(file){
            var file03 = document.getElementById('eR3').value;
            if(file.value.length==''){
                document.getElementById('sR3').style.display = "";
                document.getElementById('eR3').style.display = "none";
                document.getElementById('bR3').style.display = "none";
            }else{
                document.getElementById('sR3').style.display = "none";
                document.getElementById('eR3').style.display = "";
                document.getElementById('bR3').style.display = "";
            }
            document.getElementById('eR3').innerHTML = file03;
        } 
        function checkR4(file){
            var file04 = document.getElementById('eR4').value;
            if(file.value.length==''){
                document.getElementById('sR4').style.display = "";
                document.getElementById('eR4').style.display = "none";
                document.getElementById('bR4').style.display = "none";
            }else{
                document.getElementById('sR4').style.display = "none";
                document.getElementById('eR4').style.display = "";
                document.getElementById('bR4').style.display = "";
            }
            document.getElementById('eR4').innerHTML = file04;
        }
        function checkR5(file){
            var file05 = document.getElementById('eR5').value;
            if(file.value.length==''){
                document.getElementById('sR5').style.display = "";
                document.getElementById('eR5').style.display = "none";
                document.getElementById('bR5').style.display = "none";
            }else{
                document.getElementById('sR5').style.display = "none";
                document.getElementById('eR5').style.display = "";
                document.getElementById('bR5').style.display = "";
            }
            document.getElementById('eR5').innerHTML = file05;
        }
        function checkSKL(file){
            var file06 = document.getElementById('eR6').value;
            if(file.value.length==''){
                document.getElementById('sR6').style.display = "";
                document.getElementById('eR6').style.display = "none";
                document.getElementById('bR6').style.display = "none";
            }else{
                document.getElementById('sR6').style.display = "none";
                document.getElementById('eR6').style.display = "";
                document.getElementById('bR6').style.display = "";
            }
            document.getElementById('eR6').innerHTML = file06;
        }
    </script>

    {{-- Pembayaran PSB --}}
    <script>
        function checkR1(file){
            var file01 = document.getElementById('eR1').value;
            if(file.value.length==''){
                document.getElementById('sR1').style.display = "";
                document.getElementById('eR1').style.display = "none";
                document.getElementById('bR1').style.display = "none";
            }else{
                document.getElementById('sR1').style.display = "none";
                document.getElementById('eR1').style.display = "";
                document.getElementById('bR1').style.display = "";
            }
            document.getElementById('eR1').innerHTML = file01;
        }
        document.addEventListener('DOMContentLoaded', function() {
        var input = document.getElementById('noref');
        var maxLength = 15;

            input.addEventListener('input', function() {
                var currentValue = input.value;
                if (currentValue.length > maxLength) {
                    input.value = currentValue.slice(0, maxLength);
                }
            });
        });
    </script>

</body>

</html>