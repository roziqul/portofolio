<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Suncatchers - Admin Panel</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin-assets/node_modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/components.css') }}">

    <!-- Custom CSS -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden; /* Hide scrollbars */
        }

        .login-container {
            max-width: 400px;
            width: 90%; /* Make the container responsive */
            margin: auto;
            padding: 15px;
        }

        .login-box {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .login-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.875rem;
        }

        .d-flex {
            min-height: 100vh;
        }

        .align-items-center {
            align-items: center;
        }
    </style>
</head>

<body>
    <div id="app">
        @include('sweetalert::alert')
        <section class="d-flex align-items-center justify-content-center">
            <div class="login-container">
                <div class="login-box">
                    <div class="text-center mb-4">
                        <img src="{{ asset('admin-assets/img/stisla-fill.svg') }}" alt="logo" width="80"
                            class="shadow-light rounded-circle">
                        <h4 class="text-dark font-weight-normal mt-3">
                            <span class="font-weight-bold">Suncatchers - Admin Panel</span>
                        </h4>
                    </div>
                    <form method="post" action="{{route('post.login')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input id="name" type="text" class="form-control" name="email" tabindex="1" required
                                autofocus>
                            <div class="invalid-feedback">
                                Silahkan masukkan Email anda...
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                required>
                            <div class="invalid-feedback">
                                Silahkan masukkan password..
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right w-100" tabindex="4" style="border-radius: 6px">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    Copyright &copy; Suncatchers Tour and Travel 2024.
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('admin-assets/js/stisla.js') }}"></script>

    <!-- JS Libraries -->

    <!-- Template JS File -->
    <script src="{{ asset('admin-assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin-assets/js/custom.js') }}"></script>
    <!-- Page Specific JS File -->
</body>

</html>
