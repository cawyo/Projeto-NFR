<?php
    if(!empty($_GET['id']))
    {
      $id = $_GET['id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/loginStyle.css">
</head>
<style>
body {
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    background-image: linear-gradient(135deg, #478cac, #302b70);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
.login-container {
    background-color: #F8F8FF;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
}
.login-container h2 {
    margin-bottom: 20px;
    color: 	#000000;
}
.login-input {
    width: 92%;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #dddddd;
    border-radius: 5px;
    font-size: 16px;
    color: #555555;
}
.login-btn {
    background-color: #483D8B;
    color: #ffffff;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.login-btn:hover {
    background-color: #483D8B;
}
.login-links a {
    color: #3498db;
    text-decoration: none;
    transition: color 0.3s ease;
}
.login-links a:hover {
    color: #2980b9;
}
</style>
<body>

<div class="login-container" id="signup-container" >
        <h2>Edite os dados:</h2>
        <form id="signup-form" method="POST" action="saveEdit.php">
            <input class="login-input" type="text" placeholder="Novo nome do usuário" required name="username">
            <input class="login-input" type="email" placeholder="Novo email" required name="email">
            <input class="login-input" type="password" placeholder="Nova senha" required name="password">
            <input class="login-btn" type="submit" name="update" value="Enviar" id="update"></input>
            <input type="hidden" name="id" value="<?php echo $id ?>">
        </form>
        <div class="login-links">
            <p>Quer voltar para a tela de listagem? <a href="listarUsuario.php" id="login-link">Clique aqui.</a></p>
        </div>
    </div>

</body>
<script>

</script>
</html>

