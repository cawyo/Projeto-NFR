<?php
include 'conexao.php';
class Cadastro extends Connection{
    public function __construct(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        if($this->testeExistenciaConta($email)){
            $this->inserir_dados($username,$password,$email);
            header('Location: cadastroCerto.php');
        }
        else{
            header('Location: erroCadastro.php');
        }
        
        }

    }
}
$cadastro = new Cadastro();
?>
