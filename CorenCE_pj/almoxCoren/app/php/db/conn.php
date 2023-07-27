<?php
  $host = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "almoxCoren";

  $conn = new mysqli($host,$username,$password,$dbname);

  if($conn ->connect_error){
    die("Falha na conexão: ". $conn->connect_error);
  }
?>