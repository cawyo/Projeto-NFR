<?php
$server = "localhost";
$user - "root";
$password = "";
$database = "nfr";


$conectar = mysqli_connect($server,$user,$password,$database);

if($conectar == true){
    echo "conectado";
}
else{
    echo "erro na conexão";
}