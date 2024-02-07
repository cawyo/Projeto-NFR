<?php
include 'conexao.php';
session_start();
class Login extends Connection{
    public function __construct(){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $verificacao = $this->Login($username);
        if (password_verify($password, $verificacao[0])) {
            $_SESSION['usuario'] = $verificacao[1];
            header('location: home.php');
            exit();
        }
        else{
            header('location: loginErro.php');
        }
    }
}   
$login = new Login();