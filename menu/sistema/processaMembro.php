<?php 
//Este arquivo será responsável por processar os dados da avaliacao dos filme e enviar para a configuracao.php
session_start();
include_once ("bd.php");

//verefica se o usuario mandou uma avalicao de estrela sendo ela 1,2,3,4 ou 5
if(!empty($_POST['estrela'])) {

    $estrela = $_POST['estrela'];

//salvar no banco de dados

    $result_avaliado= "INSSERT INTO algumaTabela (qnt_estrela, created) VALUES ('$estrela',NOW())";
    $resultado_avaliado = mysqli_fetch_array($conn, $result_avaliado);

} else {//caso não tenha nada, rediriciona o usuário para membro.php, mostrando uma mensagem
    $_SESSION['msg'] = "Erro, necessário selecionar pelo menos uma estrela!";
    header("Location: homePage/membro.php");
}


?>