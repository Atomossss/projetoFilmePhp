<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.style.css" media="screen" />
    
    <title>Página do Admin</title>
</head>
<body>

        <div>
            <a href="sair.php" >
            <button type="button">Sair</button>
            </a>
            </a>
        </div>

    <h1> Criar Filmes </h1>

    <?php 
        session_start();

        if ($_SESSION['nome']){

            $nome_do_admin = $_SESSION['nome'];
            echo "Bem vindo Administrador ".$nome_do_admin;

        } 
    ?>

    <div >
        <form  method= "POST" action="admin.php">
            <div class="container-forms">
                <label> Nome do filme </label>
                <input type = "text" placeholder ="Nome do filme" name = "nome">

                <label> Sinopse </label>
                <input type = "text" placeholder ="Sinopse" name = "sinopse">

                <label> Categoria </label>
                <input type = "text" placeholder ="Categoria" name = "categoria">

                <label> Diretor </label>
                <input type = "text" placeholder ="Diretor" name = "diretor">

                <input style="margin-top: 10px;" type="submit" value="Enviar">
            </div>
        </form>
    </div>
       

    <?php 

        include_once("../sistema/bd.php");

        $nome = $_POST["nome"] ?? null;
        $sinopse =  $_POST["sinopse"] ?? null;
        $categoria = $_POST["categoria"] ?? null;
        $diretor =  $_POST["diretor"] ?? null;

        if(!is_null($nome) && !is_null($sinopse) && !is_null($categoria) && !is_null($diretor)){
            
            $sqlPost = "INSERT INTO filmes (nome, sinopse, categoria, diretor) VALUES ('$nome', '$sinopse', '$categoria', '$diretor');";
            $resultado = mysqli_query($strcon,$sqlPost) or die("Erro ao retornar dados");

        }


        $sql = "SELECT * FROM filmes";
        $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");


        echo '<table>';

        echo '<tr>';
            echo '<th> NOME </th>';
            echo '<th> SINOPSE </th>';
            echo '<th> CATEGORIA </th>';
            echo '<th> DIRETOR </th>';
        echo '</tr>';

        while($row = mysqli_fetch_array($resultado)) {

            echo '<tr>';
            echo '<td>' .  $row["nome"] .  '</td>';
            echo '<td>' .  $row["sinopse"] .  '</td>';
            echo '<td>' .  $row["categoria"] .  '</td>';
            echo '<td>' .  $row["diretor"] .  '</td>';
            echo '</tr>';
        }

        echo '</table>';

        //If de permissao precisa ser feito [feito]
        //Css e html das paginas do membro e adm[]
        // filtros dos filmes opcional[] 
        //teste de avaliacao []
        //criacao de filmes[] 
        //opcional edição de file   
        //melhorar css geral opcional[]
        //opcional logout[]
        //Pensar em uma forma de ligar os filmes com a avaliação de estrelas obeservação(criar função de mandar formulario de avaliação parao usuário)
        
    
        
    ?>
        
    
    
</body>
</html>