<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once $_SERVER['DOCUMENT_ROOT'] . "/birthday_popup/vendor/autoload.php";

// header('Content-Type: application/json; charset=utf-8');

$host = 'localhost';
$db = 'birthday_db';
$user = 'root';
$password = '';


try {
	$pdo = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);

	if ($pdo) {
		// echo "Connected to the $db database successfully! <br><pre>";
    $sql = "SELECT * FROM `birthday_popup` WHERE DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT(CURDATE(), '%m-%d')";
    $statement = $pdo->query($sql);
    
    // get all publishers
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    $html = "";
    foreach ($data as $row) {
        $html .="Name: ".$row["name"]."\nSAP ID: ".$row["id"]."\n\n";
    }
    // echo json_encode($data); 

    $upesMail = 'testing@cybersentinel.in';
    $upesMailPass = '245~PYU2mH[;';
    $host = 'mail.cybersentinel.in';
    $email = 'aarushisinha2005@gmail.com';
    $port = 587;

    // Loop through each row and column to read data
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = $host;
    $mail->Port = $port;
    $mail->Username = $upesMail;
    $mail->Password = $upesMailPass;

    $mail->From = $upesMail;
    $mail->FromName = $upesMail;


    $mail->addAddress($email);

    $mail->Subject = "TESTING SUBJECT";
    $mail->Body = $html;
    $mail->send();
    echo"Message send!!";
    } 
}
    catch (PDOException $e) {
	echo $e->getMessage();
    }

    // print_r ($data);
?>