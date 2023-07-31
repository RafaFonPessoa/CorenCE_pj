<?php
    require_once "./db/conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter o ID do item a ser removido
        $itemID = $_POST["item_id"];

        // Consulta SQL para remover o item do banco de dados
        $sql = "DELETE FROM tabela_itens WHERE id = $itemID";
        if ($conn->query($sql) === TRUE) {
            // Se a remoção for bem-sucedida, responder com "success"
            echo "success";
        } else {
            // Se houver erro na remoção, responder com "error"
            echo "error";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    }
?>
