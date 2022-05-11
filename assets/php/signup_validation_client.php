<?php
    $db_connection= new PDO('mysql:host=localhost; dbname=id9172247_strengthbuilder','id9172247_root', 'strengthbuilder');
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_connection->exec("SET CHARACTER SET utf8");

    if(isset($_POST['username'])) {
        $consult_username = "SELECT * FROM users WHERE username=?;";
        $results_username = $db_connection->prepare($consult_username);
        $results_username->execute(array($_POST['username']));
        if ($row_username = $results_username->fetch(PDO::FETCH_ASSOC)) {
            echo false;
        } else{
            echo true;
        }
        $results_username->closeCursor();
    }

    if(isset($_POST['email'])) {
        $consult_email = "SELECT * FROM users WHERE email=?;";
        $results_email = $db_connection->prepare($consult_email);
        $results_email->execute(array($_POST['email']));
        if ($row_email = $results_email->fetch(PDO::FETCH_ASSOC)) {
            echo false;
        } else{
            echo true;
        }
        $results_email->closeCursor();
    }

    $db_connection = null;
    exit();

?>