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
                <h1 style="font-size: 20px;">
                    SAIR
                </h1>
            </a>
        </div>

    

    <?php 
        session_start();

        if ($_SESSION['nome']){

            $nome_do_admin = $_SESSION['nome'];
            echo "<h1>Bem vindo Admim </h1>"."<h1>$nome_do_admin</h1>";

        } 
    ?>

    <h1> Selecione as opções </h1>

    <div >
        <a href="admin-criacao.php" >Criar Filme</a>
        <a href="admin-tabela.php" >Visualizar Filmes</a>
    </div>
        <footer>
            <div>&copy; 2024 Craze Frog Internacional O.o | Todos os direitos reservados</div>
            <div>Contato: info@crazefrog.com | Telefone: +1234567890</div>
            <div>Endereço: Rua dos Sapos Saltitantes, 123 - Cidade dos Anfíbios</div>
        </footer>
</body>
</html>