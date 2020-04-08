<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/img/logo.ico')?>" rel="shortcut icon"/>

		<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>"/>
		<link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>"/>
		
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>"/>
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/main.css')?>">
		<title><?=$title?></title>
	</head>
	<body>
		<div id="preloder">
			<div class="loader"></div>
		</div>

		<!-- Main section start -->
		<div class="main-site-warp">
			<div class="site-menu-warp">
				<div class="close-menu">x</div>
				<!-- Main menu -->
				<ul class="site-menu">
					<li><a href="<?=base_url('Welcome')?>">Home</a></li>
					<li><a href="<?=base_url('Welcome/check')?>">Check your Shoes!</a></li>
					<li><a href="<?=base_url('Welcome/about')?>">About</a></li>
					<li><a href="<?=base_url('Login')?>">Login</a></li>
				</ul>
				<div class="menu-social">
					<a href=""><i class="fa fa-pinterest"></i></a>
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-dribbble"></i></a>
					<a href=""><i class="fa fa-behance"></i></a>
				</div>
			</div>
			<header class="header-section">
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
				<div class="header-social">
					<a href=""><i class="fa fa-pinterest"></i></a>
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-dribbble"></i></a>
					<a href=""><i class="fa fa-behance"></i></a>
				</div>
			</header>
			<?= form_open('Login/process'); ?>
			<div class="limiter">
				<div class="container-login100" style="background-image: url('images/img-01.jpg');">
					<div class="wrap-login100 p-t-190 p-b-30">
						<form class="login100-form validate-form">
							<span class="login100-form-title p-t-20 p-b-45">
						  		<img src="<?=base_url('assets/images/logo.ico')?>" class="mt-5 pt-5">
							</span>

							<div class="wrap-input100 validate-input m-b-10 mt-5" data-validate = "Username is required">
								<input class="input100" type="text" name="username" placeholder="Username">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-user"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input m-b-10 mt-3" data-validate = "Password is required">
								<input class="input100" type="password" name="password" placeholder="Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock"></i>
								</span>
							</div>

							<div class="container-login100-form-btn p-t-10 mt-4">
								<button class="login100-form-btn" type="submit">
									Login
								</button>
							</div>

							<div class="text-center w-full p-t-25 p-b-230 mt-3">
								<a href="#" class="txt1">
									Forgot Username / Password?
								</a>
							</div>

						</form>
					</div>
				</div>
			</div>
			<?= form_close(); ?>
		</div>
	</body>
	<script src="<?=base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
	<script src="<?=base_url('assets/js/main.js')?>"></script>
</html>