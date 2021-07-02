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
        include "connector.php";

        $query = "SELECT n_lot FROM `lotacao`";
        $result = mysqli_query($ligax, $query);

        while($linha = mysqli_fetch_assoc($result)){
            $nAtual = $linha['n_lot'];
            echo $nAtual;
        }
    ?>

        


</body>
</html>