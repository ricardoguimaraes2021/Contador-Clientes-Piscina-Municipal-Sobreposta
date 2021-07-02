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
		
		$adulto = 0;
        $cria = 0;
        $jovem = 0;
		$receita = 0;
		$total = 0;

		$sql1 =   "UPDATE `lotacao` SET `n_adulto` = $adulto";
		$sql2 =   "UPDATE `lotacao` SET `n_lot` = $total";
		$sql3 =   "UPDATE `lotacao` SET `receita` = $receita";
        $sql4 =   "UPDATE `lotacao` SET `n_jovem` = $jovem";
        $sql5 =   "UPDATE `lotacao` SET `n_cria` = $cria";

		$statement = $conn->exec($sql1);
		$statement2 = $conn->exec($sql2);
		$statement3 = $conn->exec($sql3);
        $statement4 = $conn->exec($sql4);
        $statement5= $conn->exec($sql5);

		HEADER("location:foraservico.php");
		}
	catch(PDOException $e)
		{
		echo "Ligação com problemas. Erro: " . $e->getMessage();
		}

?>
