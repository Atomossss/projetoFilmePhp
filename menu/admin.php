<?php 
    session_start();
    $_SESSION['nome'] = $nome_do_admin;
    echo "Bem vindo Administrador ".$nome_do_admin;
    

?>