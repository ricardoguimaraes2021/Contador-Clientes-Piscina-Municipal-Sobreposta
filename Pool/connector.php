<?php
$host='localhost';
$user='root';
$pwd='';
$db='pool';


$ligax=mysqli_connect($host,$user,$pwd) or die ("Não consegui ligar ao servidor!");
mysqli_select_db($ligax,$db);
?>