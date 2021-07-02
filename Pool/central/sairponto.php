<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	
	session_start();
	$password_user = $_SESSION["pw"];
	$login =  $_SESSION['login'];

	try {
		$conn = new PDO("mysql:host=$servername;dbname=gnrfuture", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tab=$conn->query("SELECT * FROM userstable WHERE usersID='$login' AND usersPw='$password_user'");
		$sql1 =   "UPDATE `userstable` SET `usersOn` = '0' where usersID= $login";
		$statement = $conn->exec($sql1);
		HEADER("location:foraservico.php");
		}
	catch(PDOException $e)
		{
		echo "Ligação com problemas. Erro: " . $e->getMessage();
		}

?>
