<?php
require("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $avaliacao = $_POST['avaliacao'];

    $sql = "INSERT INTO fornecedor (nome, cnpj, cep, rua, bairro, numero, complemento, avaliacao) 
            VALUES ('$nome', '$cnpj', '$cep', '$rua', '$bairro', '$numero', '$complemento', '$avaliacao')";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .fundo {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .icone {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 2;
        }

        .icone i {
            font-size: 38px;
            color: #cfcfcf;
            transition: 0.3s;
        }

        .icone a {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: inherit;
        }

        .icone i:hover {
            color: royalblue;
            transition: 0.3s;
            transform: scale(1.1);
        }

        .icone[data-tooltip]:hover:after {
            content: attr(data-tooltip);
            position: absolute;
            padding: 4px 8px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            border-radius: 5px;
            font-size: 18px;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s;
            bottom: -100%;
            left: 50%;
            transform: translateX(-50%);
            pointer-events: none;
        }

        .icone[data-tooltip]:hover:after {
            opacity: 1;
        }

        .formulario-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .formulario {
            display: flex;
            flex-direction: column;
            gap: 10px;
            min-width: 400px;
            height: auto;
            background: rgba(0, 0, 0, 0.5);
            box-shadow: 0px 0px 50px rgba(255, 255, 255, 0.1);
            padding: 30px 20px;
            border-radius: 20px;
            text-align: center;
            margin: 0 auto;
            color:white;
        }

        .titulo {
            font-size: 52px;
            color: rgb(64, 187, 224);
            font-weight: 600;
            letter-spacing: -1px;
            margin-top: 0px;
            margin-bottom: 0px;
            text-shadow: 0px 0px 50px rgba(33, 113, 171, 0.5);
            transition: 0.3s;
        }

        .titulo:hover {
            color: rgb(25, 156, 207);
            transition: 0.3s;
        }

        .mensagem,
        .entrar {
            color: rgba(255, 255, 255, 0.822);
            margin: 0px;
            font-size: 18px;
        }

        .mensagem2 {
            color: rgba(255, 255, 255, 0.822);
            margin-bottom: 20px;
            margin-top: 0px;
            font-size: 32px;
        }

        .entrar a {
            color: rgb(65, 174, 225);
        }

        .enviar {
            border: none;
            outline: none;
            background-color: turquoise;
            padding: 10px;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transform: .3s ease;
            transition: 0.3s;
            cursor: pointer;
            box-shadow: inset -5px -5px 25px 3px #0c2397;
        }

        .enviar:hover {
            background-color: rgb(52, 164, 216);
            transition: 0.3s;
        }

        .formulario .opções {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }

        .formulario label[for="opcao"] {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .formulario select#opcao {
            font-family: "Lobster Two", cursive;
            width: 106%;
            padding: 10px;
            outline: 0;
            border: 1px solid rgba(105, 105, 105, 0.5);
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .formulario select#opcao::-ms-expand,
        .formulario select#opcao::-webkit-select-placeholder {
            display: none;
        }

        .formulario select#opcao:focus {
            border-color: #42a4e3;
            box-shadow: 0 0 10px rgba(66, 164, 227, 0.6);
        }

        @media (max-width: 767px) {
            body {
                background: url(img/imgfundo1.jpg) no-repeat center center;
                background-size: cover;
                height: auto;
                min-height: 100vh;
                min-width: 325px;
            }

            .icone {
                top: 20px;
                left: 20px;
            }

            .icone i {
                font-size: 32px;
            }

            .formulario {
                padding: 10px;
                min-width: 300px;
                margin: 0 auto;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1;
            }

            .titulo {
                font-size: 52px;
            }

            .mensagem {
                font-size: 14px;
            }

            .entrar {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="fundo"></div>
    <div class="formulario-container">
        <div class="icone" data-tooltip="voltar">
            <a href="menu_fornecedor.php">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <form class="formulario" method="POST" action="cadastra_proxima.php">
            <p class="titulo">Criar Conta</p>
            <p class="mensagem">Crie uma conta para ter total acesso ao nosso site.</p>
            <label>
                <span>Nome de Usuário</span>
                <input required placeholder type="text" name="usuario" class="input">
            </label>
            <label>
                <span>Email</span>
                <input required placeholder type="email" name="email" class="input">
            </label>
            <label>
                <span>Senha</span>
                <input required placeholder type="password" name="senha" class="input">
            </label>
            <label>
                <span>Confirmar Senha</span>
                <input required placeholder type="password" name="confirmPassword" class="input">
            </label>
            <button class="enviar" id="next-button" type="submit">Próxima</button>
            <p class="entrar">Já tem uma conta? <a href="login.html">Entrar</a> </p>
        </form>
    </div>
</body>

</html>
