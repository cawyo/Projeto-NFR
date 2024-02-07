<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso no Cadastro</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background-color: green;
            color: white;
            text-align: center;
            padding: 100px;
        }
    </style>
</head>
<body>

<script>
function showSuccessAlert() {
    Swal.fire({
        icon: "success",
        title: "Sucesso no Cadastro",
        text: "Seu cadastro foi realizado com sucesso, você será redirecionado para a página de login.",
        timer: 3000, 
        showConfirmButton: false
    }).then(() => {
        window.location.href = "login.php";
    });
}

document.addEventListener('DOMContentLoaded', function() {
    showSuccessAlert();
});
</script>

</body>
</html>
