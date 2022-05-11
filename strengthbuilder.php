<?php
session_start();
if(!isset($_SESSION["email"])||(time() - $_SESSION["sesLastActivity"] > 3600)){
    session_unset();
    session_destroy();
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
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
</head>
<body>
    <?php
    if(isset($_SESSION["email"])){
		echo "Welcome to StrengthBuilder " . $_SESSION["email"];
		$_SESSION["sesLastActivity"] = time();
	}
    ?>
	<p>
		<a href="close_session.php">Close session</a>
	</p>
</body>
</html>