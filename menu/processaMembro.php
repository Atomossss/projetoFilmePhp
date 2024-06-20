<?php 
//Este arquivo será responsável por processar os dados da avaliacao dos filme e enviar para a configuracao.php
session_start();
include_once ("configuracao.php")

//verefica se o usuario mandou uma avalicao de estrela sendo ela 1,2,3,4 ou 5
if(!empty($_POST['estrela'])) {

    $estrela = $_POST['estrela'];

//salvar no banco de dados

    $result_avaliacoes= "INSSERT INTO algumaTabela";

} else {//caso não tenha nada, rediriciona o usuário para membro.php, mostrando uma mensagem
    $_SESSION['msg'] = "Erro, necessário selecionar pelo menos uma estrela!";
    header("Location: membro.php");
}


?>