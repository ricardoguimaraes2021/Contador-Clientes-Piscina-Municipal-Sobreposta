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
		
		$cria = $cria-1;
        if($cria<=0){
            $cria=0;
        }
		$total = $adulto + $jovem + $cria;

		$sql1 =   "UPDATE `lotacao` SET `n_cria` = $cria";
		$sql2 =   "UPDATE `lotacao` SET `n_lot` = $total";
		$statement = $conn->exec($sql1);
		$statement2 = $conn->exec($sql2);

		HEADER("location:foraservico.php");
		}
	catch(PDOException $e)
		{
		echo "Ligação com problemas. Erro: " . $e->getMessage();
		}

?>
