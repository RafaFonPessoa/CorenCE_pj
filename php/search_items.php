<?php
    require_once "db/conn.php";

    if (isset($_POST["search_term"])) {
        $searchTerm = $_POST["search_term"];

        // Consulta SQL para obter os itens que correspondem ao termo de pesquisa
        $sql = "SELECT * FROM tabela_itens WHERE nome LIKE '%$searchTerm%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop para exibir cada item
            while ($row = $result->fetch_assoc()) {
                echo "<div class='item'>";
                echo "<h3>{$row['nome']}</h3>";
                echo "<p>Quantidade: {$row['quantidade']}</p>";
                echo "<button class='btn-increment' data-item-id='{$row['id']}' data-increment='1'>+</button>";
                echo "<button class='btn-increment' data-item-id='{$row['id']}' data-increment='-1'>-</button>";
                echo "<button class='btn-remove' data-item-id='{$row['id']}'>Remover</button>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum item encontrado.</p>";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    }
?>
