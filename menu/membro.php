
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="membro.css">
    <title>Página do Usuário</title>
</head>
<body>
    <h1> Avalie os filmes </h1>

    <?php 
    session_start();
    $_SESSION['nome'] = $nome_do_usuario;

    echo "<h2> Bem vindo $nome_do_usuario fique a vontade para avaliar os filmes </h2>".ucfirst(strtolower($nome_do_usuario));

    if(isset( $_SESSION['msg'])){

        echo " $_SESSION['msg'] <br>";
        unset( $_SESSION['msg']);

    }
    ?>
    <!-- formulário da avaliação -->
    <div class="avaliacao_filme">
   
        <form  method= "POST" action="processaMembro.php/" enctype="multipart/form-data"> 
            <div class="estrelas"> 
                <input type="radio" id="vazio" name="estrela" value ="" checked>

                <label for="estrela_um"> <i class="fa"> </i></label>
                <input type="radio" id="estrela_um" name="estrela" value ="1">

                <label for="estrela_dois"> <i class="fa"> </i></label>
                <input type="radio" id="estrela_dois" name="estrela" value ="2">

                <label for="estrela_tres"> <i class="fa"> </i></label>
                <input type="radio" id="estrela_tres" name="estrela" value ="3">

                <label for="estrela_quatro"> <i class="fa"> </i></label>
                <input type="radio" id="estrela_quatro" name="estrela" value ="4">

                <label for="estrela_cinco"> <i class="fa"> </i></label>
                <input type="radio" id="estrela_cinco" name="estrela" value ="5"> <br><br>

         <!-- envia para o banco de dados as informações da avaliação do filme contendo os valores 1,2,3,4 e 5 -->
                <input type="submit" value="Enviar">

            </div>
        </form>
    </div>

    
</body>
</html>