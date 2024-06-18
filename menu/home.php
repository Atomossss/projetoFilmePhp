<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title>Home</title>
</head>

<body>

<?php //
//Talvez colocar type password na senha  
//Início da sessão do susuário
    session_start();
    
    require_once "usuarios.php";
    

    $usuarioSessao = $_SESSION["usuario"] ?? null;
    $senha = $_SESSION["senha"] ?? null;
    echo " Funcionou finalmente" . $usuarioSessao . $senha;
    
    if(!is_null($usuarioSessao)){

        echo" FUNCIONOU AEEEEE";
        $nome = $_SESSION["nome"] ?? null;
        if(!is_null($nome)){
            echo "<h2>Bem Vindo ". ucfirst(strtolower($nome)) . " </h2>";
        }
    }else{
        
        echo " Não acertou a senha";

        $usuario = $_POST["usuario"] ?? null;
        $senha =  $_POST["senha"] ?? null;

        if(is_null($usuario) && is_null($senha)){
            echo " Fazer Login";
            require_once "formulario.php";
        }else{

            if(verificarUser($usuario, $senha)){
                echo "Fazendo Login... Entrando na Conta :)";
              
            }else{
                echo "Tentar Novamente";
                require_once "formulario.php";
            }
            
        }

    }


?>


</body>
</html>


