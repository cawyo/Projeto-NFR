<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/loginStyle.css">
    <title>Cadastro</title>
</head>
<body>

<div class="login-container" id="signup-container" >
        <h2>Cadastre-se</h2>
        <form id="signup-form" method="POST" action="cadastroSAVE.php">
            <input class="login-input" type="text" placeholder="Nome de usuário" required name="username">
            <input class="login-input" type="email" placeholder="Email" required name="email">
            <input class="login-input" type="password" placeholder="Senha" required name="password">
            <input class="login-btn" type="submit" name="submit" value="Enviar" id="submit"></input>
        </form>
        <div class="login-links">
            <p>Já tem uma conta? <a href="login.php" id="login-link">Faça login</a></p>
        </div>
    </div>

</body>
<script>

</script>
</html>







