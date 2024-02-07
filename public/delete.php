<?php
include('conexao.php');
$deleta = new Connection();
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $deleta ->delete_usuario();
    header('location:listarUsuario.php');
}
