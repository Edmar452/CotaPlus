<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos e Serviços</title>
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

        .formulario-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        form {
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

        label {
            font-size: 16px;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            outline: 0;
            border: 1px solid rgba(105, 105, 105, 0.5);
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            appearance: textfield;
            margin: 0;
        }

        input[type="submit"] {
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

        input[type="submit"]:hover {
            background-color: rgb(52, 164, 216);
            transition: 0.3s;
        }

        @media (max-width: 767px) {
            body {
                background: url(img/imgfundo1.jpg) no-repeat center center;
                background-size: cover;
                height: auto;
                min-height: 100vh;
                min-width: 325px;
            }

            form {
                padding: 10px;
                min-width: 300px;
                margin: 0 auto;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1;
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
        }
    </style>
</head>

<body>
    <div class="icone" data-tooltip="voltar">
        <a href="menu_fornecedor.php">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <div class="fundo">
        <div class="formulario-container">
            <h1>Cadastro de Produtos e Serviços</h1>
            <form method="post" action="">
                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria" required>

                <label for="referencia">Referência:</label>
                <input type="text" name="referencia" required>

                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" required>

                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" required>

                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" required>

                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
</body>

</html>
