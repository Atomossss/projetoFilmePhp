
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/membro.css">
    
    <title>Página do Usuário</title>
</head>
<body>

    <h1> Avalie os filmes </h1>
    

    <?php 
        session_start();

        if(!is_null($_SESSION['nome'])){
            $nome_do_usuario = $_SESSION['nome'];
        }else{
            echo "erro";
        }
        
        echo "<h2> Bem vindo " .$nome_do_usuario . " fique a vontade para avaliar nossa lista de filmes </>";

        //verefica se a mensagem de erro apareceu e depois termina a sesseion msg
        if (isset($_SESSION['msg'])) {

            echo "<p>" . $_SESSION['msg'] . "</p>";
            unset($_SESSION['msg']);
        }

    ?>
    <div class="nomeFilme"> 

        <?php 
            include_once("../sistema/bd.php");
                
            $sql = "SELECT * FROM filmes";
            $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
                
            echo '<table>';

            echo '<tr>';
                echo '<th> NOME </th>';
                echo '<th> CATEGORIA </th>';
                echo '<th> DIRETOR </th>';
                echo '<th> DETALHES E AVALIAÇÕES</th>';
            echo '</tr>';

            while($row = mysqli_fetch_array($resultado)) {

                echo '<tr>';
                echo '<td>' .  $row["nome"] .  '</td>';
                echo '<td>' .  $row["categoria"] .  '</td>';
                echo '<td>' .  $row["diretor"] .  '</td>';
                echo '<td> <a href="avaliacao.php?id=' . $row["id"] . '"> Ver Avaliações </td>';
                echo '</tr>';
            }

            echo '</table>'; 
        ?>

    </div>
    
        <div class="sair">
            <a href="sair.php" >
                <p style="font-size: 20px;">
                    SAIR
                </p>
            </a>
        </div>
    
</body>
</html>