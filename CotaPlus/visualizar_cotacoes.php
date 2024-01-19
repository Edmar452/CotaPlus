<?php
// Coloque o código de conexão ao banco de dados aqui (use mysqli ou PDO)

// Recupera as cotações feitas pelos clientes do banco de dados
// Substitua o código abaixo com a lógica de consulta real ao banco de dados
$cotacoes = array(
    array('cliente' => 'Cliente1', 'produto' => 'Produto A', 'quantidade' => 5),
    array('cliente' => 'Cliente2', 'produto' => 'Produto B', 'quantidade' => 10),
    // Adicione mais cotações conforme necessário
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Cotações</title>
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

        /* Container do formulário */
        .formulario-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            color:white;
        }

        /* Estilize o formulário */
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: gray;
        }
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
            <h1>Visualizar Cotações</h1>
            <table border="1">
                <tr>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                </tr>
                <?php foreach ($cotacoes as $cotacao): ?>
                    <tr>
                        <td><?php echo $cotacao['cliente']; ?></td>
                        <td><?php echo $cotacao['produto']; ?></td>
                        <td><?php echo $cotacao['quantidade']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>
