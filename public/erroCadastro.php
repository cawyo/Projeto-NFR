<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro no Cadastro</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background-color: red;
            color: white;
            text-align: center;
            padding: 100px;
        }
    </style>
</head>
<body>

<script>
function showErrorAlert() {
    Swal.fire({
        icon: "error",
        title: "Erro no Cadastro",
        text: "O e-mail já estão em uso. Você será redirecionado para a tela de cadastro.",
        timer: 3000, 
        showConfirmButton: false
    }).then(() => {
        window.location.href = "cadastro.php";
    });
}

document.addEventListener('DOMContentLoaded', function() {
    showErrorAlert();
});
</script>

</body>
</html>
