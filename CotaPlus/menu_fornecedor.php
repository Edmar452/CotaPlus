<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal do Fornecedor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Cor e opacidade em cima da imagem da tela */
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

        /* Mova o ícone para o canto superior esquerdo */
        .icone {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 2;
            /* Para garantir que o ícone esteja na frente de outros elementos */
        }

        /* Estilize o ícone */
        .icone i {
            font-size: 38px;
            /* Tamanho do ícone */
            color: #cfcfcf;
            transition: 0.3s;
        }

        /* Estilize o link para preencher toda a div do ícone */
        .icone a {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            /* Remova a decoração do link */
            color: inherit;
            /* Herda a cor do ícone */
        }

        /* Estilize o link quando passar o mouse sobre ele */
        .icone i:hover {
            color: royalblue;
            transition: 0.3s;
            transform: scale(1.1);
        }

        /* Adicione este código para o tooltip */
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

        /* Container do formulário */
        .formulario-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        /* Estilize o formulário */
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
            color: white;
        }

        /* Estilize o texto grande */
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

        /* Estilize a mensagem e o link de entrar */
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

        /* Estilize o botão de enviar */
        .enviar {
            border: none;
            outline: none;
            background-color: turquoise;
            padding: 15px;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transition: 0.3s;
            cursor: pointer;
            box-shadow: inset -5px -5px 25px 3px #0c2397;
        }

        .enviar:hover {
            background-color: rgb(52, 164, 216);
            transition: 0.3s;
        }

        /* Estilos para os botões */
        ul {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 10px;
        }

        li button {
            border: none;
            outline: none;
            padding: 15px;
            border-radius: 10px;
            color: black;
            font-size: 16px;
            transition: 0.3s;
            cursor: pointer;;
        }

        li button:hover {
            background-color: rgb(52, 164, 216);
            transition: 0.3s;
        }

        /* Estilos para o campo de seleção (select) */
        .formulario .opções {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }

        .formulario label[for="opcao"] {
            font-size: 16px;
            /* Tamanho da fonte do rótulo */
            margin-bottom: 10px;
            /* Espaçamento inferior */
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
            /* Outros estilos que você deseja adicionar, como borda quando em foco ou hover */
        }

        /* Estilize a seta para baixo do select (apenas uma sugestão) */
        .formulario select#opcao::-ms-expand,
        .formulario select#opcao::-webkit-select-placeholder {
            display: none;
        }

        /* Estilos adicionais quando o select está em foco */
        .formulario select#opcao:focus {
            border-color: #42a4e3;
            /* Cor da borda quando em foco */
            box-shadow: 0 0 10px rgba(66, 164, 227, 0.6);
            /* Sombra quando em foco */
        }

        /* Estilos para telas menores (por exemplo, smartphones) */
        @media (max-width: 767px) {
            body {
                background: url(img/imgfundo1.jpg) no-repeat center center;
                background-size: cover;
                height: auto;
                min-height: 100vh;
                min-width: 325px;
            }

            /* Mova o ícone para o canto superior esquerdo */
            .icone {
                top: 20px;
                left: 20px;
            }

            /* Estilize o ícone */
            .icone i {
                font-size: 32px;
                /* Tamanho do ícone */
            }

            /* Container do formulário */
            .formulario {
                padding: 10px;
                min-width: 300px;
                margin: 0 auto;
                /* Centralize horizontalmente */
                position: absolute;
                /* Mude para posição absoluta */
                top: 50%;
                /* Ajuste a margem superior para 50% */
                left: 50%;
                /* Centralize horizontalmente em 50% */
                transform: translate(-50%, -50%);
                /* Corrija a centralização vertical e horizontal */
                z-index: 1;
                /* Defina um valor de z-index para o formulário */
            }

            /* Texto grande */
            .titulo {
                font-size: 52px;
            }

            /* Entrar conta */
            .mensagem {
                font-size: 14px;
            }

            .entrar {
                font-size: 16px;
            }

            /* Estilos para os botões em telas menores */
            li button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="fundo">
        <div class="icone" data-tooltip="voltar">
            <a href="index.html">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

        <div class="formulario-container">
            <h1 class="titulo">Bem-vindo, Fornecedor!</h1>
            <ul>
                <li><button><a href="cadastrar_dados_fornecedor.php">Cadastrar Dados</a></button></li>
                <li><button><a href="perfil_fornecedor.php">Perfil</a></button></li>
                <li><button><a href="cadastro_produto.php">Cadastrar produtos</a></button></li>
                <li><button><a href="visualizar_cotacoes.php">Visualizar Cotações</a></button></li>
            </ul>
        </div>
    </div>
</body>

</html>
