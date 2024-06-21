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
            <a href="admin.php" >
                <h1 style="font-size: 20px;">
                    Voltar
                </h1>
            </a>
        </div>

    <h1> Visualizar Filmes </h1>


    <?php 

        include_once("../sistema/bd.php");

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


        
    ?>
        
    
        <footer>
            <div>&copy; 2024 Craze Frog Internacional O.o | Todos os direitos reservados</div>
            <div>Contato: info@crazefrog.com | Telefone: +1234567890</div>
            <div>Endereço: Rua dos Sapos Saltitantes, 123 - Cidade dos Anfíbios</div>
        </footer>
</body>
</html>