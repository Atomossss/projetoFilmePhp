<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/membro.css">
    
    <title>Avaliação</title>
</head>
<body >

        <a href="membro.php"> Voltar </a>


        <?php 
            include_once("../sistema/bd.php");

            $filme_id = $_GET["id"];
                
            $sql = "SELECT * FROM filmes WHERE id = '$filme_id'";
            $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
                
            while($row = mysqli_fetch_array($resultado)) {
                
                echo '<h1 class="container"> Titulo: ' .  $row["nome"] .  '</h1>';
                echo '<h2 class="containerr"> Sinopse: ' .  $row["sinopse"] .  '</h2>';
                echo '<h2 class="containerrr"> Categoria: ' .  $row["categoria"] .  '</h2>';
                echo '<h2 class="containerrrr"> Diretor: ' .  $row["diretor"] .  '</h2>';
                echo '<br></br>';
            }
        ?>

    <!-- formulário da avaliação -->
    <div class="avaliacao_filme">
        <h3 >Deixe aqui sua valiação </h3>

        <?php 
            echo '<form  method= "POST" action="avaliacao.php?id='.  $filme_id .'" enctype="multipart/form-data">';
        ?>
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

                <textarea name="comentarios"></textarea>
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>

    <?php 


            session_start();
            $id_usuario = $_SESSION["id_usuario"];
            $filme_id = $_GET["id"];

            $estrela = $_POST["estrela"] ?? null;
            $comentarios = $_POST["comentarios"] ?? null;


            if(!is_null($estrela) && !is_null($comentarios)){
                $sqlPost = "INSERT INTO avaliacao (id_filme, id_usuario, nota, comentario) VALUES ('$filme_id', '$id_usuario', '$estrela', '$comentarios');";
                $resultado = mysqli_query($strcon,$sqlPost) or die("Erro ao retornar dados");
            }
                

            $sql = "SELECT avaliacao.nota, avaliacao.comentario, usuarios.nome  FROM avaliacao INNER JOIN usuarios ON avaliacao.id_usuario = usuarios.id WHERE avaliacao.id_filme = '$filme_id'";
            $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
            
            while($row = mysqli_fetch_array($resultado)) {

                echo '<h1>' . $row["nome"] .  '</h1>';
                echo '<h2> Nota: ' .  $row["nota"] .  '</h2>';
                echo '<h2> Comentario: ' .  $row["comentario"] .  '</h2>';
                echo '<br></br>';
            }
        ?>

    
</body>
</html>



