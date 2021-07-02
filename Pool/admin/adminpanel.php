<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        include "../connector.php";
        include "verifyLog.php";


        $query = "SELECT n_lot FROM `lotacao`";
        $result = mysqli_query($ligax, $query);

        if(isset($_POST['subtrair'])){
            while($linha = mysqli_fetch_assoc($result)){
                $nAtual = $linha['n_lot'];
            }
            
            $nAtual--;
            echo $nAtual;
            enviar($ligax, $nAtual);
            
        }else if(isset($_POST['somar'])){
            while($linha = mysqli_fetch_assoc($result)){
                //var_dump($linha) ;
                $nAtual = $linha['n_lot'];
            }
            
            $nAtual++;
            echo $nAtual;
            enviar($ligax, $nAtual);
        }


        function enviar($ligax, $nAtual){
            $queryResult = mysqli_query(
                $ligax,
                "UPDATE lotacao SET n_lot  = $nAtual"
            );
        }
        
        while($linha = mysqli_fetch_assoc($result)){
            $nAtual = $linha['n_lot'];
            echo $nAtual;
        }
    ?>

</body>
    
    <form action="adminpanel.php" method="post">
        <input type="submit" value="somar" name="somar">
        <input type="submit" value="subtrair" name="subtrair">
    </form>

</html>
