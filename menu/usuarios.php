<?php
$usuarios = [
        ["usu" => "victorX", "nome" => "Victor de Lucca", "senha" => "111"],
        ["usu" => "fer", "nome" => "Fernanda", "senha" => "222"],
        ["usu" => "tulipa", "nome" => "Tineu", "senha" => "333"]
    ];

    function verificarUser($userRecebido, $senhaRecebida){

        global $usuarios;
        
        for($i=0; $i < count($usuarios); $i++){

            if($usuarios[$i]["usu"] == $userRecebido){
                
                if($usuarios[$i]["senha"] == $senhaRecebida){

                    $_SESSION["usuario"] = $usuarios[$i]["usu"];
                    $_SESSION["senha"] = $usuarios[$i]["senha"];

                    return true;

                }else{
                    echo "Senha inválida";
                }
            }
        }

        return false;
    }

?>