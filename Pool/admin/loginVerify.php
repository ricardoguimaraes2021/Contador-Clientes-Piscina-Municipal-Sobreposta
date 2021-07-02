<?php

    $credentials = [
        'user' => 'admin',
        'password' => 'admin'
    ];

    if ( $credentials['user'] !== $_POST['user'] OR $credentials['password'] !== $_POST['pass'] ){
   
        header('Location: ' . 'adminLogin.php');
        exit();
    }

        session_start();
        
        // Storing session data
        $_SESSION["isLogged"] = "1";
        
        header('Location:' . '../central/foraservico.php');
        
        exit();

?>