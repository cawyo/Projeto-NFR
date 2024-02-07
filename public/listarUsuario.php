<?php
    session_start();
    include 'conexao.php';
    $instancia = new Connection();
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ListaUsuariosStyle.css">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
</head>
<body>
<nav>
    <a href="" class="nome">Listagem de Usuarios - NFR</a>
    <a class="logout" href="home.php">Tela principal</a>  
</nav>
    <h1>
        Seja bem vindo 
        <?php
            if($_SESSION == !NULL){
                echo "".$_SESSION['usuario'].".";
            } 
        ?>
    </h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Usuário</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">...</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $instancia->mostrar_lista_usuario();
            ?>
        </tbody>
    </table>
</body>
</html>
    