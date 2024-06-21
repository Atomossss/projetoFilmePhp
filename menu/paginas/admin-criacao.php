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

    <h1> Criar Filmes </h1>

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

    ?>
        <footer>
            <div>&copy; 2024 Craze Frog Internacional O.o | Todos os direitos reservados</div>
            <div>Contato: info@crazefrog.com | Telefone: +1234567890</div>
            <div>Endereço: Rua dos Sapos Saltitantes, 123 - Cidade dos Anfíbios</div>
        </footer>
        
    
</body>
</html>