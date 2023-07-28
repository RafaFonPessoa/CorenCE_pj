<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../styles/images/coren-ce_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/almox_style.css">
    <title>Almoxarifado</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <img id="logo-coren" src="../styles/images/coren-ce_logo.png">
        <h1>Controle de Almoxarifado</h1>
        <div class="navbar-buttons">
            <a href="cadastro.html">
                <button id="btn-cadastrar">
                    <span class="btn-text">Cadastrar</span>
                </button>
            </a>
            <a href="login.html">
                <button id="btn-sair">
                    <span class="btn-text">Sair</span>
                </button>
            </a>
            <button id="btn-adicionar-item">
                <span class="btn-text">Adicionar Item</span>
            </button>
            <input type="text" id="search-bar" placeholder="Pesquisar item...">
        </div>
    </nav>

    <!-- Lista de Itens -->
    <div class="item-list">
        <?php
            // Conexão com o banco de dados (se já não estiver feito)
            require_once "../php/db/conn.php";

            // Consulta SQL para obter todos os itens da tabela
            $sql = "SELECT * FROM tabela_itens";
            $result = $conn->query($sql);

            // Verificar se existem registros na tabela
            if ($result->num_rows > 0) {
                // Loop para exibir cada item
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='item'>";
                    echo "<h3>{$row['nome']}</h3>";
                    echo "<p>Quantidade: {$row['quantidade']}</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum item encontrado.</p>";
            }

            // Fechar a conexão com o banco de dados
            $conn->close();
        ?>
    </div>

    <!-- Modal para adicionar item -->
    <div id="add-item-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Adicionar Item</h2>
            <label for="item-nome">Nome do Item:</label>
            <input type="text" id="item-nome" required>
            <label for="item-quantidade">Quantidade:</label>
            <input type="number" id="item-quantidade" required>
            <button id="btn-adicionar">Adicionar</button>
        </div>
    </div>

    <!-- Script para controle do modal -->
    <script src="../javascript/modal.js"></script>
</body>
</html>
