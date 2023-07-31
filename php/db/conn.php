<?php
  $host = "127.0.0.1";
  $username = "root";
  $password = "root";
  $dbname = "almoxCoren";

  $conn = new mysqli($host, $username, $password, $dbname);

  if($conn->connect_error){
      die("Falha na conexão: " . $conn->connect_error);
  }   
?>

