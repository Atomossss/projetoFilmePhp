<?php
    include_once("bd.php");

    function verificarUser($userRecebido, $senhaRecebida){

        global $strcon;

        $sql = "SELECT * FROM usuarios WHERE user_login = '$userRecebido' AND senha = '$senhaRecebida'";
        $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");

        while($row = mysqli_fetch_array($resultado)) {

            if($row['nome'] != null){
                $_SESSION["id_usuario"] = $row['id'];
                $_SESSION["usuario"] = $row['user_login'];
                $_SESSION["senha"] = $row['senha'];
                $_SESSION["nome"] = $row['nome'];
                $_SESSION["permissao"] = $row['nivel_permissao'];
        
                return true;
            }
        }

        return false;
    }
?>
