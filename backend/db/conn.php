<?php 
    $host = "";
    $user = "";
    $password = "";
    $database = "";

    $conn = new mysqli($host,$user,$password,$database);

    if($conn->connect_error){
        die("Erro na conexão com o banco de dados" . $conn->connect_error);
    }
?>