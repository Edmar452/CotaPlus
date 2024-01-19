<?php
require_once('conecta.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usuario']) && !empty($_POST['usuario']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['senha']) && !empty($_POST['senha']) &&
        isset($_POST['confirmPassword']) && !empty($_POST['confirmPassword'])) {

        $camposFormulario1 = ["usuario", "email", "senha", "confirmPassword"];
        $dadosFormulario1 = [];

        foreach ($camposFormulario1 as $campo) {
            $dadosFormulario1[$campo] = $_POST[$campo];
        }

        session_start();
        $_SESSION['dadosFormulario1'] = $dadosFormulario1;

        header("Location: proxima.html");
        exit;
    } elseif (isset($_POST['opcao']) && !empty($_POST['opcao']) &&
        isset($_POST['nomeCompleto']) && !empty($_POST['nomeCompleto']) &&
        isset($_POST['contato']) && !empty($_POST['contato'])) {

        $camposFormulario2 = ["opcao", "nomeCompleto", "contato"];
        $dadosFormulario2 = [];

        foreach ($camposFormulario2 as $campo) {
            $dadosFormulario2[$campo] = $_POST[$campo];
        }

        session_start();
        $dadosFormulario1 = isset($_SESSION['dadosFormulario1']) ? $_SESSION['dadosFormulario1'] : [];

        unset($_SESSION['dadosFormulario1']);
        session_write_close();

        $dadosCompletos = array_merge($dadosFormulario1, $dadosFormulario2);

        $usuario = filter_var($dadosCompletos["usuario"], FILTER_SANITIZE_STRING);
        $email = filter_var($dadosCompletos["email"], FILTER_VALIDATE_EMAIL);
        $senha = $dadosCompletos["senha"];
        $opcao = filter_var($dadosCompletos["opcao"], FILTER_SANITIZE_STRING);
        $nomeCompleto = filter_var($dadosCompletos["nomeCompleto"], FILTER_SANITIZE_STRING);
        $contato = filter_var($dadosCompletos["contato"], FILTER_SANITIZE_STRING);

        if ($opcao === "Fornecedor") {
            $cnpj = filter_var($_POST["cnpj"], FILTER_SANITIZE_STRING);
            $consulta = $conn->prepare("INSERT INTO fornecedor (usuario, email, senha, opcao, nomeEstabelecimento, cnpj, telefone) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $consulta->bind_param("sssssss", $usuario, $email, $senha, $opcao, $nomeCompleto, $cnpj, $contato);
        } else {
            $cpf = filter_var($_POST["cpf"], FILTER_SANITIZE_STRING);
            $dataNascimento = isset($_POST["dataNascimento"]) ? $_POST["dataNascimento"] : null;
            $consulta = $conn->prepare("INSERT INTO cliente (usuario, email, senha, opcao, nomeCompleto, cpf_usuario, dataNascimento, telefone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $consulta->bind_param("ssssssss", $usuario, $email, $senha, $opcao, $nomeCompleto, $cpf, $dataNascimento, $contato);
        }

        if ($consulta->execute()) {
            header("Location: login.html");
            exit;
        } else {
            echo "Erro na execução da consulta: " . $consulta->error;
            exit;
        }

        $consulta->close();
    } else {
        echo "Preencha todos os campos do formulário.";
        exit;
    }
}
?>
