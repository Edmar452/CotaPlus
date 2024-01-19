<?php
session_start();
require_once('conecta.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT id, usuario, email, senha, telefone FROM cliente WHERE email = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $nome, $email, $storedPassword, $telefone);
        $stmt->fetch();

        if ($senha == $storedPassword) {

            $_SESSION["id"] = $id;
            $_SESSION["nome"] = $nome;
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            $_SESSION["telefone"] = $telefone;

            header("Location: solicita_produto.html");
            exit();
        } else {
            header("Location: login.html");
            exit();
        }
    } else {
        header("Location: login.html");
        exit();
    }

    $conn->close();
}
?>
