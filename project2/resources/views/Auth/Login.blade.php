<!doctype html>
<html lang="en">

<head>
	<title>Login Admisi</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('adminAssets/logo/nvl.ico')}}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('loginAssets/css/style.css')}}">

</head>

<body style="background-color: #ffffff;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center mb-5" style="width: 100%">
					<h1 style="color: #30308b; font-family:Poppins;">Admisi PSB - SMP Unggulan NOVAL</h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url('{{asset('adminAssets/logo/Noval_Logo.jpg')}}'); background-color: #FFFFFF; background-size:contain; background-width">
						</div>
						<div class="login-wrap p-4 p-md-5" style="background-color: #30308b;">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4" style="text-align: center; color:white">Login Akun Admisi</h3>
								</div>
							</div>
							<form action="{{ route('postLogin')}}" class="signin-form" method="post">
								@csrf
								<div class="form-group mb-3">
									<label class="label" for="name" style="color: white">Email</label>
									<input type="text" name="email" class="form-control" placeholder="johndoe@example.com" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password" style="color: white">Password</label>
									<input type="password" name="password" class="form-control" placeholder="password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn rounded submit px-3" style="background-color: #FFFFFF; margin-top:40px">Masuk</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<a href="#" style="color: white">Lupa Password</a>
									</div>
								</div>
							</form>
							<p class="text-center" style="color: white">Belum memiliki akun? <a href="{{ route('getRegister')}}" style="color: #FFFFFF;">Daftar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset ('loginAssets/js/jquery.min.js')}}"></script>
	<script src="{{asset ('loginAssets/js/popper.js')}}"></script>
	<script src="{{asset ('loginAssets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset ('loginAssets/js/main.js')}}"></script>

</body>

</html>