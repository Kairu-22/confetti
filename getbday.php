<?php

header('Content-Type: application/json; charset=utf-8');

$host = 'localhost';
$db = 'birthday_db';
$user = 'root';
$password = '';


try {
	$pdo = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);

	if ($pdo) {
		// echo "Connected to the $db database successfully! <br><pre>";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
    }

    
    $sql = "SELECT * FROM `birthday_popup` WHERE DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT(CURDATE(), '%m-%d')";
    $statement = $pdo->query($sql);
    
    // get all publishers
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data); 
    
    // print_r ($data);
?>