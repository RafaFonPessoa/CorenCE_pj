<?php
  $host =;
  $username =;
  $password =;
  $dbname =;

  $conn = new mysqli($host,$root,$password,$dbname);

  if($conn ->connect_error){
    die("Falha na conexão: ". $conn->connect_error);
  }
?>