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
    <script src="assets/js/signup_validation_client.js"></script>
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
					<a class="nav-item nav-link" href="login.php">Iniciar sesión</a>
					<a class="nav-item nav-link active" href="signup.php">Registrarse</a>
			</div>
		</div>
	</nav>
    
	<section class="container-fluid text-center pt-4 min-vh-100 w-100">
		<div class="row">
			<div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
			<div class="col-10 col-sm-8 col-md-6 col-lg-4 mx-auto pl-0 pr-0">
				<p class="font-weight-bold pt-4">Introduce tus datos personales para registrarte en StrengthBuilder.</p>
				<hr class="mb-4">

                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="empty_fields_error"){
                        echo "<p class='warning-css'>Rellene todos los campos.</p>";
                    }elseif($_GET["error"]=="date_error"){
                        echo "<p class='warning-css'>Introduce una fecha válida.</p>";
                    }elseif($_GET["error"]=="duplicate_username_error"){
                        echo "<p class='warning-css'>Ya existe una cuenta con ese nombre de usuario.</p>";
                    }elseif($_GET["error"]=="email_error"){
                        echo "<p class='warning-css'>Dirección de correo electrónico no válida.</p>";
                    }elseif($_GET["error"]=="duplicate_email_error"){
                        echo "<p class='warning-css'>Ya existe una cuenta con ese correo electrónico.</p>";
                    }elseif($_GET["error"]=="password_not_match_error"){
                        echo "<p class='warning-css'>Tus contraseñas no coinciden.</p>";
                    }elseif($_GET["error"]=="password_error"){
                        echo "<p class='warning-css'>Tu contraseña debe contener mas de 8 carácteres alfanumericos.</p>";
                    }
                }
                ?>

				<form action="assets/php/signup_validation_server.php" method="post" onsubmit="return incorrectSignUp();">
					<p class="mb-2"><input type="text" id="firstname" name="firstname" placeholder="Nombre" class="col-12  pl-2 pr-2 input-css" autocomplete="off" onfocus="return onFocusFirstname();" onfocusout="return onFocusLostFirstname();"></p>
                    <div style="display: none" id="firstnameEmpty" class="text-left">Por favor, introduzca su nombre.</div>
					<p class="mb-2"><input type="text" id="lastname" name="lastname" placeholder="Apellidos" class="col-12  pl-2 pr-2 input-css" autocomplete="off" onfocus="return onFocusLastname();" onfocusout="return onFocusLostLastname();"></p>
                    <div style="display: none" id="lastnameEmpty" class="text-left">Por favor, introduzca sus apellidos.</div>
					<p class="row mb-2">
						<span class="col-3">
							<input type="number" id="born-day" name="born-day" placeholder="Día" class="input-css pl-2 pr-2" autocomplete="off" onfocus="return onFocusBornday();" onfocusout="return onFocusLostBornday();">
						</span>
						<span class="col-5">
							<select name="born-month" id="born-month" class="select-css pl-2 pr-2" placeholder="Mes" onfocus="return onFocusBornmonth();" onfocusout="return onFocusLostBornmonth();">
								<option disabled selected hidden>Mes</option>
								<option value="1">Enero</option>
								<option value="2">Febrero</option>
								<option value="3">Marzo</option>
								<option value="4">Abril</option>
								<option value="5">Mayo</option>
								<option value="6">Junio</option>
								<option value="7">Julio</option>
								<option value="8">Agosto</option>
								<option value="9">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
						</span>
						<span class="col-4">
							<input type="number" id="born-year" name="born-year" placeholder="Año" class="input-css pl-2 pr-2" autocomplete="off" onfocus="return onFocusBornyear();" onfocusout="return onFocusLostBornyear();">
						</span>
					</p>
                    <div style="display: none" id="borndateEmpty" class="text-left">Por favor, introduzca su fecha de nacimiento.</div>
					<p class="text-left mb-2  pl-2 pr-2"><input type="radio" id="male" name="gender" value="male" class="radio-button-css" onfocus="return onFocusMale();" onclick="return onFocusMale()"><span class="mr-5 radio-text-css"> Masculino</span><input type="radio" id="female" name="gender" value="female" class="radio-button-css" onfocus="return onFocusFemale();" onclick="return onFocusFemale()"> <span class="mr-5 radio-text-css">Femenino</span></p>
                    <div style="display: none" id="genderEmpty" class="text-left">Por favor, indique su sexo.</div>
					<hr class="mb-4">
					<p class="mb-2"><input type="text" name="username" id="username" placeholder="Nombre de usuario" class="col-12  pl-2 pr-2 input-css" autocomplete="off" onfocus="return onFocusUsername();" onfocusout="return onFocusLostUsername();"></p>
                    <div style="display: none" id="usernameEmpty" class="text-left">Por favor, introduzca un nombre de usuario válido.</div>
                    <p class="text-left" id="username_validation" style="display: none">Nombre de usuario no disponible</p>
					<p class="mb-2"><input type="text" name="email" id="email" placeholder="Correo electrónico" class="col-12  pl-2 pr-2 input-css" autocomplete="off" onfocus="return onFocusEmail();" onfocusout="return onFocusLostEmail();"></p>
                    <div style="display: none" id="emailEmpty" class="text-left">Por favor, introduzca un email válido.</div>
                    <p class="text-left" id="email_validation" style="display: none">Correo electrónico no disponible</p>
					<p class="mb-2"><input type="password" id="password" name="password" placeholder="Contraseña" class="col-12  pl-2 pr-2 input-css" autocomplete="off" onfocus="return onFocusPassword();" onfocusout="return onFocusLostPassword();"></p>
                    <div style="display: none" id="passwordEmpty" class="text-left">Por favor, elige una contraseña.</div>
					<p class="mb-2"><input type="password" id="confirm_password" name="confirm_password" placeholder="Repetir contraseña" class="col-12  pl-2 pr-2 input-css" autocomplete="off" onfocus="return onFocusConfirmpassword();" onfocusout="return onFocusLostConfirmpassword();"></p>
                    <div style="display: none" id="confirmpasswordEmpty" class="text-left">Por favor, repita la contraseña.</div>
                    <div style="display: none" id="passwordNotMatch" class="text-left">Las contraseñas no coinciden.</div>
                    <p><input type="submit" name="signup" value="Registrarse" class="col-12 button-css-blue"></p>
				</form>
				<p class="font-weight-bold col-12">¿Ya tienes cuenta? <a href="login.php" class="link-css-blue">Entrar</a></p>
				<hr class="mb-4">
				<p class="text-size-sm">Al hacer clic en Registrarse, aceptas los <a class="font-weight-bold link-css-blue" href="terms&conditions.php">Términos y Condiciones</a> de StrengthBuilder. </p>
			</div>
			<div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
		</div>
	</section>

	<footer class="container-fluid bg-dark text-white footer-sm pb-3">
		<h6 class="text-center pt-2">© 2019 StrengthBuilder, Inc.</h6>
	</footer>
    
</body>
</html>