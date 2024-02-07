<?php


class Connection {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "nfr";

    protected function testeExistenciaConta($email){
        $conexao = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        $comando = "SELECT nome_usuario FROM usuarios WHERE email = '$email';";
        $resultado = mysqli_query($conexao,$comando);
        $dados = array();
        while($linha = mysqli_fetch_assoc($resultado)){
            $dados[0] = $linha['nome_usuario'];
        }
        if(count($dados) > 0 ){
            return false;
        }
        else{
            return true;
        }
    }

    protected function inserir_dados($usuario,$senha,$email){
        $conexao = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        $comando = "INSERT INTO usuarios VALUES(default, '$usuario','$senha','$email');";
        $resultado = mysqli_query($conexao,$comando);
    }
    protected function Login($usuario){
        $conexao = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        $comando = "SELECT nome_usuario,senha FROM usuarios WHERE nome_usuario = '$usuario';";
        $resultado = mysqli_query($conexao,$comando);
        $dados = array();
        while($linha = mysqli_fetch_assoc($resultado)){
            $dados[0] = $linha['senha'];
            $dados[1] = $linha['nome_usuario'];
        }
        return $dados;
    }
   protected function listar_usuario(){
        $conexao = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        $comando = "SELECT * FROM usuarios ORDER BY id ASC;";
        $resultado = mysqli_query($conexao,$comando);
        $dados = array();
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $dados[] = $linha;
        }
        return $dados; 
    }
   public function mostrar_lista_usuario(){
        $dados = $this->listar_usuario();
        foreach ($dados as $usuario) {
            echo "<tr>";
            echo "<td>" . $usuario['id'] . "</td>";
            echo "<td>" . $usuario['nome_usuario'] . "</td>";
            echo "<td>" . $usuario['email'] . "</td>";
            echo "<td>" . $usuario['senha'] . "</td>";
            echo "<td>
            <a class='btn btn-primary' href='edit.php?id={$usuario['id']}'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-fill-gear' viewBox='0 0 16 16'>
            <path d='M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0'/>
            </svg>
            </a>
            <a class='btn btn-danger' href='delete.php?id={$usuario['id']}'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-fill-dash' viewBox='0 0 16 16'>
                <path d='M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0'/>
                <path d='M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4'/>
            </svg>
            </a>
            </td>";
            echo "</tr>";
        }
    }
    public function update_usuario(){
        $id = $_POST["id"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $conexao = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        $comando = "UPDATE usuarios SET nome_usuario='$username',senha='$password',email='$email' WHERE id='$id'";
        $resultado = mysqli_query($conexao,$comando);
    }
    public function delete_usuario(){
        $id = $_GET["id"];
        $conexao = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        $comando = "DELETE FROM usuarios WHERE id='$id';";
        $resultado = mysqli_query($conexao,$comando);
    }

}






