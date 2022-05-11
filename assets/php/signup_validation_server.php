<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

	$db_connection= new PDO('mysql:host=localhost; dbname=id9172247_strengthbuilder','id9172247_root', 'strengthbuilder');
	$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db_connection->exec("SET CHARACTER SET utf8");

	if(empty($_POST["firstname"])||empty($_POST["lastname"])||empty($_POST["born-day"])||empty($_POST["born-month"])||empty($_POST["born-year"])||empty($_POST["gender"])||empty($_POST["username"])||empty($_POST["email"])||empty($_POST["password"])||empty($_POST["confirm_password"])){
	    header("location: ../../signup.php?error=empty_fields_error");
        $db_connection=null;
        exit();
	}

	if(!checkdate($_POST["born-month"],$_POST["born-day"],$_POST["born-year"])){
	    header("location: ../../signup.php?error=date_error");
	    $db_connection=null;
	    exit();
	} else {
	    $user_birth_year=(int)$_POST["born-year"];
        $user_birth_month=(int)$_POST["born-month"];
        $user_birth_day=(int)$_POST["born-day"];
	    $today_date=$today = getdate();
        $today_date_year=(int)$today["year"];
        $today_date_month=(int)$today["mon"];
        $today_date_day=(int)$today["mday"];
	    $expire_date_year=1920;
        $expire_date_month=1;
        $expire_date_day=1;
	    if($user_birth_year>$today_date_year||$user_birth_year<$expire_date_year){
            header("location: ../../signup.php?error=date_error");
            $db_connection=null;
            exit();
	    } elseif(($user_birth_month>$today_date_month&&$user_birth_year==$today_date_year)||($user_birth_month<$expire_date_month&&$user_birth_year==$expire_date_year)) {
            header("location: ../../signup.php?error=date_error");
            $db_connection=null;
            exit();
        } elseif(($user_birth_day>$today_date_day&&$user_birth_year==$today_date_year&&$user_birth_month==$today_date_month)||($user_birth_day<$expire_date_day&&$user_birth_year==$expire_date_year&&$user_birth_month==$expire_date_month)){
            header("location: ../../signup.php?error=date_error");
            $db_connection=null;
            exit();
        }
	}

	if(true) {
        $consult_checkusername = "SELECT * FROM users WHERE username=?;";
        $results_checkusername = $db_connection->prepare($consult_checkusername);
        $results_checkusername->execute(array($_POST["username"]));
        if ($row_checkusername = $results_checkusername->fetch(PDO::FETCH_ASSOC)) {
            header("location: ../../signup.php?error=duplicate_username_error");
            $results_checkusername->closeCursor();
            $db_connection = null;
            exit();
        }
        $results_checkusername->closeCursor();
    }


	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	    header("location: ../../signup.php?error=email_error");
        $db_connection = null;
        exit();
	} else {
        $consult_checkemail = "SELECT * FROM users WHERE email=?;";
        $results_checkemail = $db_connection->prepare($consult_checkemail);
        $results_checkemail->execute(array($_POST["email"]));
        if ($row_checkemail = $results_checkemail->fetch(PDO::FETCH_ASSOC)) {
            header("location: ../../signup.php?error=duplicate_email_error");
            $results_checkemail->closeCursor();
            $db_connection = null;
            exit();
        }
        $results_checkemail->closeCursor();
    }

	if(!($_POST["password"]==$_POST["confirm_password"])){
	    header("location: ../../signup.php?error=password_not_match_error");
	    $db_connection=null;
	    exit();
	} else{
	    if (strlen($_POST["password"]) < 8) {
	        header("location: ../../signup.php?error=password_error");
	        $db_connection=null;
	        exit();
	    }
	    if (!preg_match("#[0-9]+#", $_POST["password"])) {
	        header("location: ../../signup.php?error=password_error");
	        $db_connection=null;
	        exit();
	    }
	    if (!preg_match("#[a-zA-Z]+#", $_POST["password"])) {
	        header("location: ../../signup.php?error=password_error");
	        $db_connection=null;
	        exit();
	    }
	}

	$user_birthday=date("Y-m-d",strtotime($_POST["born-year"] . "-" . $_POST["born-month"] . "-" . $_POST["born-day"]));
	$password_crypted=password_hash($_POST["password"], PASSWORD_DEFAULT, array("cost"=>10));
	$verification_key=password_hash((time() . $_POST["username"]), PASSWORD_DEFAULT, array("cost"=>10));
	$consult_signup="INSERT INTO users (username, firstname, lastname, birthday, gender, email, password,verification_key) VALUES (?,?,?,?,?,?,?,?);";
	$results_signup=$db_connection->prepare($consult_signup);
	$results_signup->execute(array($_POST["username"],$_POST["firstname"],$_POST["lastname"],$user_birthday,$_POST["gender"],$_POST["email"],$password_crypted,$verification_key));
	header("location: ../../login.php?error=confirm_email_error");
    $results_signup->closeCursor();
    $db_connection = null;

    require '../phpmailer/vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 1;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "hs.developers.official@gmail.com";
        $mail->Password = "strengthbuilder2019";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('hs.developers.official@gmail.com', 'StrengthBuilder');
        $mail->addAddress($_POST['email']);
        $mail->isHTML(true);
        $mail->Subject = 'Completa tu registro';
        $url_email_confirmation="https://strengthbuilderofficial.000webhostapp.com/emailverification.php?vkey=" . $verification_key;
        $mail->Body    = "<p>Para completar tu registro confirma tu correo electrónico <a href='$url_email_confirmation'>aquí</a>.</p>";
        $mail->send();
    } catch (Exception $e) {

    }

    exit();

?>