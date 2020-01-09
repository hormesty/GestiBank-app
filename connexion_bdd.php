<?php
// Fichier de configuration du site 

// connexion à la BDD :
//     $pdo = new PDO('mysql:host=localhost;dbname=heritage_db', 
//                 'root', 
//                 '',
//                 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
//                       PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8')
// );



	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "heritage_db";
	$conn = mysqli_connect($server, $username, $password, $db);
?>

