<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StrengthBuilder</title>
	<link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/icons/css/all.css">
	<script src="assets/js/jquery/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/login_validation_client.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand" href="index.html">
			<img class="align-top" src="assets/images/logo-white.png" width="45" height="25">
			StrengthBuilder
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
			  	<a class="nav-item nav-link active" href="login.php">Iniciar sesión</a>
			  	<a class="nav-item nav-link" href="signup.php">Registrarse</a>
			</div>
		</div>
	</nav>

	<section class="container-fluid text-center pt-4 min-vh-100 w-100">
		<div class="row">
			<div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
			<div class="col-10 col-sm-8 col-md-6 col-lg-4 mx-auto">
				<p class="font-weight-bold pt-4">Para continuar, inicia sesión en StrengthBuilder.</p>
				<hr class="mb-4">

				<?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="login_error"){
                            echo "<p class='warning-css'>Correo electrónico o contraseña incorrectos.</p>";
                        } elseif($_GET["error"]=="confirm_email_error"){
                            echo "<p class='warning-css'>Confirme su correo electrónico.</p>";
                        }
                    }
				?>

				<form id="loginForm" action="assets/php/login_validation_server.php" method="post" onsubmit="return incorrectLogin();">
					<p class="mb-2"><input type="text" name="email" id="email" placeholder="Correo electrónico" class="col-12  pl-2 pr-2 input-css" autocomplete="off" onfocus="return onFocusEmail();" onfocusout="return onLostFocusEmail();" ></p>
                    <div style="display: none" id="emailEmpty" class="text-left">Escriba su correo electrónico.</div>
					<p class="mb-2"><input type="password" name="password" id="password" placeholder="Contraseña" class="col-12  pl-2 pr-2 input-css" autocomplete="off" onfocus="return onFocusPassword();" onfocusout="return onLostFocusPassword();"></p>
                    <div style="display: none" id="passwordEmpty" class="text-left">Escriba su contraseña.</div>
                    <p><input type="submit" name="loginButton" id="loginButton" value="Iniciar sesión" class="button-css-blue"></p>
				</form>
				<a class="font-weight-bold link-css-blue" href="forgetpassword.php">¿Olvidaste tu contraseña?</a>
				<hr class="mt-4 pb-2">
				<p class="font-weight-bold">¿No tienes cuenta?</p>
				<p><button class="button-css-grey-outlined" onclick="location.href='signup.php'">Regístrate en StrengthBuilder</button></p>
				<hr class="mt-4 pb-1">
				<p class="text-size-sm">Al hacer clic en iniciar sesión, aceptas los <a class="font-weight-bold link-css-blue" href="terms&conditions.php">Términos y Condiciones</a> de StrengthBuilder. </p>
			</div>
			<div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
		</div>
	</section>

	<footer class="container-fluid bg-dark text-white footer-sm pb-3">
		<h6 class="text-center pt-2">© 2019 StrengthBuilder, Inc.</h6>
	</footer>

</body>
</html>