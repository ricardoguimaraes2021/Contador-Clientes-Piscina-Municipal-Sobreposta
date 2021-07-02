<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=pool", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$func = "admin";
		$cont = $conn->query("SELECT * FROM lotacao");
		$ficha = $cont->fetch();
		$adulto = $ficha['n_adulto'];
		$jovem = $ficha['n_jovem'];
		$cria = $ficha['n_cria'];
		$receita = $ficha['receita'];
		
		$adulto = $adulto+1;
		$receita = $receita+2.2;
		$total = $adulto + $jovem + $cria;

		$sql1 =   "UPDATE `lotacao` SET `n_adulto` = $adulto";
		$sql2 =   "UPDATE `lotacao` SET `n_lot` = $total";
		$sql3 =   "UPDATE `lotacao` SET `receita` = $receita";

		$statement = $conn->exec($sql1);
		$statement2 = $conn->exec($sql2);
		$statement3 = $conn->exec($sql3);

		HEADER("location:foraservico.php");
		}
	catch(PDOException $e)
		{
		echo "Ligação com problemas. Erro: " . $e->getMessage();
		}

?>
