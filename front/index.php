<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Loja</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
        }

        table thead {
            background-color:blue;
        }

        table th {
            background-color: blue;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border: none;
        }

        table tbody tr {
            border-bottom: 1px solid #ecf0f1;
            transition: background-color 0.2s;
        }

        table tbody tr:hover {
            background-color: #f8f9fa;
        }

        table td {
            padding: 12px 15px;
            color: #2c3e50;
            border: none;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="formulario">
        <h1>📦 Cadastrar Produtos</h1>
            <hr>
                <form action="../api/createProduct.php" method="POST">
                <label for="">Descrição</label>
                <input type="text" name="descricao">
                <label for="">Valor Compra</label>
                <input type="text" name="valorCompra">
                <label for="">Valor Venda</label>
                <input type="text" name="valorVenda">
                <label for="">Quantidade</label>
                <input type="text" name="quantidade"><br><br>
                <label for="">Categoria</label>
                <input type="text" name="categoria"><br><br>
                <button type="submit">Cadastrar Produto</button>
                </form>
        </div>

    <div class="listagem">
        <h1>📋 Produtos Cadastrados</h1>
        <?php
            require_once '../api/config.php';
            
            $sql = 'SELECT * FROM produto';
            $response = mysqli_query($conexao, $sql);
            
            if($response && mysqli_num_rows($response) > 0) {
                $result = mysqli_fetch_all($response, MYSQLI_ASSOC);
                
                echo '<table>';
                echo '<thead><tr><th>Descrição</th><th>Categoria</th><th>V. Compra</th><th>V. Venda</th><th>Quantidade</th></tr></thead>';
                echo '<tbody>';
                
                foreach($result as $produto) {
                    echo '<tr>';
                    echo '<td>' . $produto['descricao'] . '</td>';
                    echo '<td>' . $produto['categoria'] . '</td>';
                    echo '<td>R$ ' . number_format($produto['valorCompra'], 2, ',', '.') . '</td>';
                    echo '<td>R$ ' . number_format($produto['valorVenda'], 2, ',', '.') . '</td>';
                    echo '<td>' . $produto['quantidade'] . '</td>';
                    echo '</tr>';
                }
                
                echo '</tbody></table>';
            } else {
                echo '<p>Nenhum produto cadastrado</p>';
            }
            
        ?>
    </div>
    </div>
</body>
</html>