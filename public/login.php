<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/loginStyle.css">
    <title>Login</title>
</head>
<body>

<div class="logo">
    <img src="../resources/logo2.png" alt="">
</div>
    
    <div class="login-container" style="margin: 10%;">
        <h2>Bem-vindo</h2>
        <form id="login-form" method="post" action="loginREAD.php">
            <input class="login-input" type="text" placeholder="Nome de usuário" required name ="username">
            <input class="login-input" type="password" placeholder="Senha" required name="password">
            <input class="login-btn" type="submit" name="submit" value="Enviar"></input>
        </form>
        <div class="login-links">
            <p>Não tem uma conta? <a href="cadastro.php" id="signup-link">Registre-se</a></p>
            <p><a href="#" id="forgot-password-link">Esqueceu a senha?</a></p>
        </div>
    </div>
</body>
