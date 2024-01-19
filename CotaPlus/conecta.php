<?php

  $host = 'localhost:3306';
  $username = 'root';
  $password = '';
  $database = 'cotaplus';

  $conn = new mysqli($host, $username, $password, $database);

  if($conn->connect_errno) {
    echo 'Erro na conexão!' . "<br>";
    echo 'Erro:' . $conn->connect_error;
  }