<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Erro</title>
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
        title: "Oops...",
        text: "Algo deu errado, você será redirecionado para a página de login.",
        timer: 3000,
        showConfirmButton: false
    }).then(() => {
        window.location.href = "login.php";
    });
}
document.addEventListener('DOMContentLoaded', function() {
    showErrorAlert();
});
</script>

</body>
</html>
