<?php
    include('conexao.php');
    $atualiza = new Connection();
    if(isset($_POST['update'])){
        $atualiza->update_usuario();
        header('Location: listarUsuario.php');
    }
?>