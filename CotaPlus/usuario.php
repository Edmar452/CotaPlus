<?php
session_start();
require_once('conecta.php');

if (!isset($_SESSION["id"])) {
    header("Location: login.html");
    exit();
}
$sql = "SELECT usuario, email, telefone, senha FROM cliente WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION["id"]);
$stmt->execute();
$stmt->bind_result($nome, $email, $telefone, $senha);
$stmt->fetch();
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            font-family: Arial, Helvetica, sans-serif;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .perfil {
            width: 450px;
            background: rgba(0, 0, 0, 0.5);
            box-shadow: 0px 0px 50px rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 10px 0px 40px;
            font-size: 18px;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1;
            /* mantem acima do background*/
        }

        .nome-perfil {
            color: rgb(64, 187, 224);
            text-shadow: 0px 0px 20px rgba(33, 113, 171, 0.5);
            font-size: 20px;
        }

        #descricao {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 300px;
            height: 100px;
            border: 1px solid #444444;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            padding: 10px;
            resize: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        #descricao:read-only:focus {
            outline: none;
        }


        #editIcon {
            position: relative;
            margin-right: -16.5em;
            bottom: 1.3em;
            color: #888;
            cursor: pointer;
            display: inline-block;
        }

        #editIcon:hover {
            color: #333;
        }

        #editIcon::after {
            content: attr(data-tooltip);
            display: none;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            font-size: 12px;
            padding: 5px;
            border-radius: 5px;
            bottom: 120%;
            left: 50%;
            transform: translateX(-50%);
            font-family: Arial, Helvetica, sans-serif;
            text-transform: none;
            font-weight: 500;
        }

        #editIcon:hover::after {
            display: block;
        }

        .info-container {
            display: block;
            width: 320px;
            margin-top: 5px;
            text-align: center;
            border: 1px solid #444444;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            font-weight: 500;
        }

        .redirecionar {
            color: #0073e6;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            margin-top: 3px;
            margin-right: -250px;
            transition: 0.3s;
        }

        .redirecionar:hover {
            transition: 0.3s;
            font-size: 13px;
            text-decoration: underline;
            color: rgb(64, 187, 224);
            text-shadow: 0px 0px 50px rgba(33, 113, 171, 0.5);
        }

        .nome-container {
            width: 320px;
            margin-top: 5px;
            text-align: center;
            border: 1px solid #cacaca;
            border-radius: 5px;
        }

        .nome {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        #endereço {
            padding: 10px 0px 10px;
        }

        .endereço {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 22px;
            transition: 0.3s;   
        }

        .endereço:hover {
            font-size: 24px;
            color: rgb(64, 187, 224);
            text-shadow: 0px 0px 50px rgba(33, 113, 171, 0.5);
            transition: 0.3s;   
        }
        
        p {
            cursor: pointer;
            font-size: 16px;
        }

        p:hover {
            font-size: 17px;
            color: rgb(64, 187, 224);
            text-shadow: 0px 0px 50px rgba(33, 113, 171, 0.5);
            transition: 0.3s;     
        }

        @media (max-width: 767px) {

        .perfil {
            width: 330px;
            padding: 10px 0px 40px;
            font-size: 16px;
        }    

        .info-container {
            width: 250px;
        }

        #descricao {
            width: 230px;
            height: 80px;
        }

        #editIcon {
            margin-right: -14em;
            bottom: 1.4em;
        }

        .redirecionar {
            margin-right: -180px;
        }
        }   

    </style>
    <title>Document</title>
</head>

<body>
    <div class="fundo"></div>
    <header>
        <nav class="search-bar">
            <label for="menu-checkbox" class="menu-icon">
                <i class="fa-solid fa-bars fa-2xl"></i>
            </label>
            <input type="checkbox" id="menu-checkbox" class="menu-checkbox" />
            <div class="options-menu">
                <a href="usuario.php"><i class="fa-solid fa-user"></i> Perfil</a>
                <a href="endereço.html"><i class="fa-sharp fa-solid fa-location-dot"></i></i> Endereços</a>
                <a href="fornecedor.html"><i class="fa-solid fa-cart-flatbed-suitcase"></i>
                    Fornecedor</a>
                <a href="solicita_produto.html"><i class="fa-solid fa-pen-to-square"></i> Cotação</a>
                <a href="logout.php" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Logout</a>
            </div>
        </nav>
    </header>
    <div class="perfil">
        <div class="nome-perfil">
            <h1><?php echo isset($nome) ? $nome : "Nome do Perfil"; ?></h1>
        </div>
        <div class="descrição">
            <textarea id="descricao" placeholder="Adicione uma descrição" readonly></textarea>
            <i class="fas fa-pencil-alt" id="editIcon" data-tooltip="Editar/Salvar"></i>
        </div>
        <div class="info-container">
            <p class="email"><?php echo isset($email) ? $email : "emaildousuario@example.com"; ?></p>
        </div>
        <a href="#" class="redirecionar">Alterar Email</a>
        <div class="info-container">
        <p class="senha"><?php echo isset($senha) ? $senha : "************"; ?></p>
        <a href="#" class="redirecionar">Alterar Senha</a>
        </div>
        <div class="info-container">
            <p class="numero"><?php echo isset($telefone) ? $telefone : "(14)99876-5432"; ?></p>
        </div>
        <a href="#" class="redirecionar">Alterar número</a>
        <div class="info-container" id="endereço">
            <a href="endereço.html" class="endereço">Seus
                Endereços</a>
        </div>
    </div>
    <script>

        const habilitarEdicaoBtn = document.getElementById("editIcon");
        const descricaoTextarea = document.getElementById("descricao");

        habilitarEdicaoBtn.addEventListener("click", () => {
            if (descricaoTextarea.hasAttribute("readonly")) {
                descricaoTextarea.removeAttribute("readonly");
            } else {
                descricaoTextarea.setAttribute("readonly", true);
            }
        });
    </script>
</body>

</html>