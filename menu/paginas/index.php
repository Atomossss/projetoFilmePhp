<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
    <title>Home</title>
</head>

<body>

<?php
//Talvez colocar type password na senha  
//Início da sessão do usuário
    session_start();
    
    require_once "../sistema/usuarios.php";
    

    $usuarioSessao = $_SESSION["usuario"] ?? null;
    $senha = $_SESSION["senha"] ?? null;
    
    if(!is_null($usuarioSessao)){

      //  echo" FUNCIONOU AEEEEE";
        $nome = $_SESSION["nome"] ?? null;
        $permissao = $_SESSION["permissao"] ?? null;
        if(!is_null($nome)){
            echo "<h2>Bem Vindo ". ucfirst(strtolower($nome)) . " </h2>";
        }
        if($permissao == 1){
            require_once "admin.php";
            header("Location: admin.php");
        } else {
            require_once "membro.php";
            header("Location: membro.php");
        }
    }else{
        include_once "formulario.php";

        $usuario = $_POST["usuario"] ?? null;
        $senha =  $_POST["senha"] ?? null;

        if(is_null($usuario) && is_null($senha)){
            //echo " Fazer Login";
            include_once "formulario.php";
        }else{

            if(verificarUser($usuario, $senha)){
              //  echo "Fazendo Login... Entrando na Conta :)";
                header('Location: '.$_SERVER['REQUEST_URI']);
              
            }else{
                echo "Senha inválida";
                    // fazer var dump
                echo "Tentar Novamente";

                require_once "formulario.php";
            }
            
        }

    }


?>


</body>
</html>


