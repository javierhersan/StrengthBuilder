<?php
    $db_connection= new PDO('mysql:host=localhost; dbname=id9172247_strengthbuilder','id9172247_root', 'strengthbuilder');
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_connection->exec("SET CHARACTER SET utf8");

    $user_email=$_POST["email"];
    $user_password=$_POST["password"];

    $consult_login="SELECT * FROM users WHERE email=?;";
    $results_login=$db_connection->prepare($consult_login);
    $results_login->execute(array($user_email));
        
    if($row_login=$results_login->fetch(PDO::FETCH_ASSOC)){
        if(password_verify($user_password, $row_login['password'])){
            if($row_login['verified']=="false"){
                header("location: ../../login.php?error=confirm_email_error");
                $results_login->closeCursor();
                $db_connection=null;
                exit();
            }
            session_start();
            session_regenerate_id();
            $_SESSION["email"]=$user_email;
            $_SESSION["sesCreation"] = time();
            $_SESSION["sesLastActivity"] = time();
            header("location: ../../strengthbuilder.php");
            $results_login->closeCursor();
            $db_connection=null;
            exit();
        } else{
            header("location: ../../login.php?error=login_error");
            $results_login->closeCursor();
            $db_connection=null;
            exit();
        }
    }else{
        header("location: ../../login.php?error=login_error");
        $results_login->closeCursor();
        $db_connection=null;
        exit();
    }
?>