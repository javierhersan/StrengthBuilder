<?php
    if(isset($_GET["vkey"])){
        $db_connection= new PDO('mysql:host=localhost; dbname=id9172247_strengthbuilder','id9172247_root', 'strengthbuilder');
        $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db_connection->exec("SET CHARACTER SET utf8");

        $consult_verification_key="SELECT * FROM users WHERE verification_key=?;";
        $results_verification_key=$db_connection->prepare($consult_verification_key);
        $results_verification_key->execute(array($_GET["vkey"]));

        if($row_verification_key=$results_verification_key->fetch(PDO::FETCH_ASSOC)) {
            $consult_email_comfirmed="UPDATE users SET verified=?, verification_key=? WHERE verification_key=?;";
            $results_email_comfirmed=$db_connection->prepare($consult_email_comfirmed);
            $results_email_comfirmed->execute(array("true","verified",$_GET["vkey"]));
            echo "Confirmación de correo electrónico realizada con éxito.";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StrengthBuilder</title>
        <link rel="icon" type="image/png" href="assets/images/favicon.png">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/index.css">
        <link rel="stylesheet" type="text/css" href="assets/icons/css/all.css">
        <script src="assets/js/jquery/jquery-3.3.1.min.js"></script>
        <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    </head>
    <body>

    </body>
</html>